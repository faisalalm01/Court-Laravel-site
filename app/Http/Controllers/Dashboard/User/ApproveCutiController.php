<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\CutiHistory;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FlowPengajuanCuti;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ApproveCutiController extends Controller
{
    public function getPegawai()
    {
        $user = Auth::user();
        return Pegawai::where('nip', $user->nip)->first();
    }

    public function index()
    {
        $pegawai = Auth::user()->pegawai;
        $jabatan = $pegawai->jabatan->nama_jabatan;

        // mapping field berdasarkan jabatan approver
        $map = FlowPengajuanCuti::mapJabatanToField($jabatan);

        if ($map) {
            $data = CutiPegawai::where($map['app_field'], 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } else {
            $data = collect(); // kalau jabatannya tidak termasuk flow approval
        }

        return view('dashboard.user.aprove_cuti', [
            'title' => 'Dashboard User | Daftar Approval Cuti',
            'data'  => $data
        ]);
    }

    public function showUpdateCutiApprove(Request $request)
    {
        $data = CutiPegawai::findOrFail($request->cutiId);

        return view('dashboard.user.aprove_update', [
            'title' => 'Dashboard User | Approval Cuti Update',
            'data' => $data
        ]);
    }



    public function updateApprovalCuti(Request $request, string $cutiId)
    {
        $cuti = CutiPegawai::findOrFail($cutiId);
        $pegawai = $this->getPegawai();
        $nip = $pegawai->nip;
        $jabatan = $pegawai->jabatan->nama_jabatan;
        $status = $request->input('status_cuti');
        $catatan = $request->input('catatan');
        $map = FlowPengajuanCuti::mapJabatanToField($jabatan);
        if ($status === 'Disetujui') {
            $nextAtasan = FlowPengajuanCuti::getNextApproval($cuti->pegawai, $jabatan);
            if ($nextAtasan) {
                // masih ada approval berikutnya
                $cuti->update([
                    $map['app_field']  => 1,
                    $map['user_field'] => $nip,
                    'status_cuti'      => 'Diajukan',
                    'ket_status_cuti'  => 'Menunggu Approval ' . ucwords(strtolower($nextAtasan->jabatan->nama_jabatan)),
                ]);
                Notification::create([
                    'id_user'        => $nextAtasan->user->id_user,
                    'id_pegawai'     => $cuti->id_pegawai,
                    'id_cutipegawai' => $cuti->id_cutipegawai,
                    'tipe'           => 'approval_cuti',
                    'pesan'          => "{$cuti->pegawai->nama_pegawai} mengajukan " . strtolower($cuti->jenis_cuti) .
                        " selama {$cuti->lama_cuti} hari. Menunggu persetujuan Anda.",
                ]);
            } else {
                // approval terakhir (Ketua)
                $cuti->update([
                    $map['app_field']  => 1,
                    $map['user_field'] => $nip,
                    'status_cuti'      => 'Disetujui',
                    'ket_status_cuti'  => 'Pengajuan Cuti Diterima',
                ]);
                // update cuti history
                $jenisCutiMap = [
                    'Cuti Tahunan'                 => 'Tahunan',
                    'Cuti Besar'                   => 'Besar',
                    'Cuti Sakit'                   => 'Sakit',
                    'Cuti Melahirkan'              => 'Melahirkan',
                    'Cuti Karena Alasan Penting'   => 'Alasan Penting',
                    'Cuti diluar Tanggungan Negara' => 'Luar Tanggungan'
                ];

                $normalizedJenis = $jenisCutiMap[$cuti->jenis_cuti] ?? null;

                if ($normalizedJenis) {
                    $cutiHistory = CutiHistory::where('id_pegawai', $cuti->id_pegawai)
                        ->where('tahun', now()->year)
                        ->where('jenis_cuti', $normalizedJenis)
                        ->first();

                    if ($cutiHistory) {
                        $cutiHistory->increment('terpakai', (int) $cuti->lama_cuti);
                    } else {
                        Log::warning('CutiHistory tidak ditemukan saat pengurangan jatah cuti', [
                            'id_pegawai' => $cuti->id_pegawai,
                            'jenis_cuti' => $normalizedJenis,
                            'tahun'      => now()->year
                        ]);
                    }
                }
                Notification::create([
                    'id_user'        => $cuti->pegawai->user->id_user,
                    'id_pegawai'     => $cuti->id_pegawai,
                    'id_cutipegawai' => $cuti->id_cutipegawai,
                    'tipe'           => 'cuti_disetujui',
                    'pesan'          => "Pengajuan " . strtolower($cuti->jenis_cuti) .
                        " Anda selama {$cuti->lama_cuti} hari telah disetujui.",
                ]);
            }
        } elseif ($status === 'Ditolak') {
            $cuti->update([
                'status_cuti'      => 'Tidak Disetujui',
                'ket_status_cuti'  => $catatan,
                $map['user_field'] => $nip,
                $map['app_field']  => 0
            ]);
            Notification::create([
                'id_user'        => $cuti->pegawai->user->id_user,
                'id_pegawai'     => $cuti->id_pegawai,
                'id_cutipegawai' => $cuti->id_cutipegawai,
                'tipe'           => 'cuti_ditolak',
                'pesan'          => "Pengajuan " . strtolower($cuti->jenis_cuti) .
                    " Anda selama {$cuti->lama_cuti} hari ditolak",
            ]);
        } elseif ($status === 'Ditangguhkan') {
            $cuti->update([
                'status_cuti'     => 'Ditangguhkan',
                'ket_status_cuti' => $catatan,
            ]);
            Notification::create([
                'id_user'        => $cuti->pegawai->user->id_user,
                'id_pegawai'     => $cuti->id_pegawai,
                'id_cutipegawai' => $cuti->id_cutipegawai,
                'tipe'           => 'cuti_ditangguhkan',
                'pesan'          => "Pengajuan " . strtolower($cuti->jenis_cuti) .
                    " Anda selama {$cuti->lama_cuti} hari ditangguhkan",
            ]);
        } else {
            $cuti->update([
                'status_cuti'     => 'Perubahan',
                'ket_status_cuti' => $catatan,
            ]);
            Notification::create([
                'id_user'        => $cuti->pegawai->user->id_user,
                'id_pegawai'     => $cuti->id_pegawai,
                'id_cutipegawai' => $cuti->id_cutipegawai,
                'tipe'           => 'cuti_perubahan',
                'pesan'          => "Pengajuan " . strtolower($cuti->jenis_cuti) .
                    " Anda selama {$cuti->lama_cuti} hari memerlukan perubahan. Catatan: {$catatan}",
            ]);
        }

        return redirect()->route('dashboard.user.daftar-approve-cuti')
            ->with('success', 'Pengajuan cuti berhasil diproses.');
    }
}
