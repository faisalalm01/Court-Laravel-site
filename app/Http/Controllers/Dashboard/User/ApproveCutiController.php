<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\CutiHistory;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveCutiController extends Controller
{
    public function getPegawai()
    {
        $user = Auth::user();
        return Pegawai::where('nip', $user->nip)->first();
    }

    public function index()
    {
        $nip = Auth::user()->pegawai->nip;
        $jabatan = Auth::user()->pegawai->jabatan->nama_jabatan;

        if ($jabatan == 'KETUA') {
            $data = CutiPegawai::where('app_panitera_sekretaris', 1)
                ->where('app_ketua', 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } elseif ($jabatan == 'PANITERA') {
            $data = CutiPegawai::where('app_panmud_kasubag', 1)
                ->where('app_panitera_sekretaris', 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } elseif ($jabatan == 'SEKRETARIS') {
            $data = CutiPegawai::where('app_panmud_kasubag', 1)
                ->where('app_panitera_sekretaris', 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } elseif (in_array($jabatan, [
            'PANMUD HUKUM',
            'PANMUD GUGATAN',
            'PANMUD PERMOHONAN',
            'KASUBAG KEPEGAWAIAN DAN ORTALA',
            'KASUBAG PERNCANAAN, IT DAN PELAPORAN',
            'KASUBAG UMUM DAN KEUANGAN'
        ])) {
            $data = CutiPegawai::where('app_panmud_kasubag', 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } else {
            $data = collect(); // Pegawai tanpa akses approval
        }

        return view('dashboard.user.aprove_cuti', [
            'title' => 'Dashboard User | Daftar Approval Cuti',
            'data' => $data
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

    private function getPegawaiByJabatan($namaJabatan)
    {
        return Pegawai::whereHas('jabatan', function ($query) use ($namaJabatan) {
            $query->where('nama_jabatan', $namaJabatan);
        })->first();
    }

    public function updateApprovalCuti(Request $request, string $cutiId)
    {
        $cuti = CutiPegawai::findOrFail($cutiId);
        $pegawai = $this->getPegawai();
        $nip = $pegawai->nip;
        $jabatan = $pegawai->jabatan->nama_jabatan;
        $status = $request->input('status_cuti');
        $catatan = $request->input('catatan');

        if ($status === 'Disetujui') {
            if (in_array($jabatan, [
                'PANMUD HUKUM',
                'PANMUD GUGATAN',
                'PANMUD PERMOHONAN',
                'KASUBAG KEPEGAWAIAN DAN ORTALA',
                'KASUBAG PERNCANAAN, IT DAN PELAPORAN',
                'KASUBAG UMUM DAN KEUANGAN'
            ])) {
                $cuti->update([
                    'app_panmud_kasubag' => 1,
                    'panmud_kasubag' => $nip,
                    'ket_status_cuti' => 'Menunggu Approval Panitera / Sekretaris',
                    'app_ketua' => 1,
                    'status_cuti' => 'Diajukan'
                ]);
                // $next = $this->getPegawaiByJabatan('PANITERA');
                // if ($next) {
                //     Notification::create([
                //         'id_pegawai' => $next->id_pegawai,
                //         'pesan' => "Ada cuti menunggu approval dari PANITERA.",
                //     ]);
                // }
            } elseif (in_array($jabatan, ['PANITERA', 'SEKRETARIS'])) {
                $cuti->update([
                    'app_panitera_sekretaris' => 1,
                    'panitera_sekretaris' => $nip,
                    'ket_status_cuti' => 'Menunggu Approval Ketua',
                    'app_ketua' => 0,
                    'status_cuti' => 'Diajukan'
                ]);
                // $next = $this->getPegawaiByJabatan('KETUA');
                // if ($next) {
                //     Notification::create([
                //         'id_pegawai' => $next->id_pegawai,
                //         'pesan' => "Ada cuti menunggu approval dari KETUA.",
                //     ]);
                // }
            } elseif ($jabatan === 'KETUA') {
                $cuti->update([
                    'app_ketua' => 1,
                    'ketua' => $nip,
                    'status_cuti' => 'Disetujui',
                    'ket_status_cuti' => 'Pengajuan Cuti Diterima'
                ]);

                // ✅ Kurangi jatah cuti di CutiHistory
                $jenisCutiMap = [
                    'Cuti Tahunan' => 'Tahunan',
                    'Cuti Besar' => 'Besar',
                    'Cuti Sakit' => 'Sakit',
                    'Cuti Melahirkan' => 'Melahirkan',
                    'Cuti Karena Alasan Penting' => 'Alasan Penting',
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
                        \Log::warning('CutiHistory tidak ditemukan saat pengurangan jatah cuti', [
                            'id_pegawai' => $cuti->id_pegawai,
                            'jenis_cuti' => $normalizedJenis,
                            'tahun' => now()->year
                        ]);
                    }
                }
            }
        } elseif ($status === 'Ditolak') {
            $cuti->update([
                'status_cuti' => 'Tidak Disetujui',
                'ket_status_cuti' => $catatan,
                strtolower(str_replace(' ', '_', $jabatan)) => $nip,
                'app_ketua' => 0
            ]);
        } elseif ($status === 'Ditangguhkan') {
            $cuti->update([
                'status_cuti' => 'Ditangguhkan',
                'ket_status_cuti' => $catatan
            ]);
        } else {
            $cuti->update([
                'status_cuti' => 'Perubahan',
                'ket_status_cuti' => $catatan
            ]);
        }

        return redirect()->route('dashboard.user.daftar-approve-cuti')
            ->with('success', 'Pengajuan cuti berhasil diproses.');
    }
}
