<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePengajuanCutiRequest;
use App\Models\CutiPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveCutiController extends Controller
{
    public function getPegawai()
    {
        $user = Auth::user();
        return  Pegawai::where('nip', $user->nip)->first();
    }
    public function index()
    {
        $nip = $this->getPegawai()->nip;
        $pegawai = Pegawai::with('jabatan')->where('nip', $nip)->first();
        if (!$pegawai) {
            return redirect()->back()->with('error', 'Pegawai tidak ditemukan.');
        }
        $jabatanpegawai = $pegawai->jabatan->nama_jabatan;
        if (in_array($jabatanpegawai, [
            'PANMUD HUKUM',
            'PANMUD HUKUM GUGATAN',
            'PANMUD HUKUM PERMOHONAN',
            'KASUBAG KEPEGAWAIAN DAN ORTALA',
            'KASUBAG PERNCANAAN, IT DAN PELAPORAN',
            'KASUBAG UMUM DAN KEUANGAN'
        ])) {
            $data = CutiPegawai::with(['pegawai.jabatan', 'pegawai.golongan'])
                ->where('panmud_kasubag', $nip)
                ->where('app_panmud_kasubag', 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } elseif (in_array($jabatanpegawai, ['PANITERA', 'SEKRETARIS'])) {
            $data = CutiPegawai::with(['pegawai.jabatan', 'pegawai.golongan'])
                ->where('panitera_sekretaris', $nip)
                ->where('app_panitera_sekretaris', 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } elseif ($jabatanpegawai == 'KETUA') {
            $data = CutiPegawai::with(['pegawai.jabatan', 'pegawai.golongan'])
                ->where('app_ketua', 0)
                ->where('status_cuti', 'Diajukan')
                ->get();
        } else {
            $data = collect();
        }
        return view('dashboard.user.aprove_cuti', ['title' => 'Dashboard User | Daftar Approval Cuti', 'data' => $data]);
    }
    public function showUpdateCutiApprove(Request $request)
    {
        $data = CutiPegawai::findOrFail($request->cutiId);
        return view('dashboard.user.aprove_update', ['title' => 'Dashboard User | Approval Cuti Update', 'data' => $data]);
    }
    public function updateApprovalCuti(Request $request, string $cutiId)
    {
        $cuti = CutiPegawai::findOrFail($cutiId);
        $nip = $this->getPegawai()->nip;
        $jabatan = $this->getPegawai()->jabatan->nama_jabatan;
        $status_cuti = $request->input('status_cuti');
        $catatan = $request->input('catatan');
        if ($status_cuti == 'Disetujui') {
            if (in_array($jabatan, [
                'PANMUD HUKUM',
                'PANMUD HUKUM GUGATAN',
                'PANMUD HUKUM PERMOHONAN',
                'KASUBAG KEPEGAWAIAN DAN ORTALA',
                'KASUBAG PERNCANAAN, IT DAN PELAPORAN',
                'KASUBAG UMUM DAN KEUANGAN'
            ])) {
                $cuti->update([
                    'app_panmud_kasubag' => 1,
                    'ket_status_cuti' => 'Menunggu Approval Ketua',
                    'panmud_kasubag' => $nip
                ]);
            } elseif (in_array($jabatan, ['PANITERA', 'SEKRETARIS'])) {
                $cuti->update([
                    'app_panitera_sekretaris' => 1,
                    'ket_status_cuti' => 'Menunggu Approval Ketua',
                    'panitera_sekretaris' => $nip
                ]);
            } elseif ($jabatan == 'KETUA') {
                $cuti->update([
                    'app_ketua' => 1,
                    'status_cuti' => 'Disetujui',
                    'ketua' => $nip,
                    'ket_status_cuti' => 'Pengajuan Cuti Diterima'
                ]);
            }
        } else if ($status_cuti == 'Ditolak') {
            if (in_array($jabatan, [
                'PANMUD HUKUM',
                'PANMUD HUKUM GUGATAN',
                'PANMUD HUKUM PERMOHONAN',
                'KASUBAG KEPEGAWAIAN DAN ORTALA',
                'KASUBAG PERNCANAAN, IT DAN PELAPORAN',
                'KASUBAG UMUM DAN KEUANGAN'
            ])) {
                $cuti->update([
                    'status_cuti' => 'Tidak Disetujui',
                    'panmud_kasubag' => $nip,
                    'ket_status_cuti' => $catatan
                ]);
            } elseif (in_array($jabatan, ['PANITERA', 'SEKRETARIS'])) {
                $cuti->update([
                    'status_cuti' => 'Tidak Disetujui',
                    'panitera_sekretaris' => $nip,
                    'ket_status_cuti' => $catatan
                ]);
            } elseif ($jabatan == 'KETUA') {
                $cuti->update([
                    'status_cuti' => 'Tidak Disetujui',
                    'ketua' => $nip,
                    'ket_status_cuti' => $catatan
                ]);
            }
        } else if ($status_cuti == 'Ditangguhkan') {
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
        return redirect()->route('dashboard.user.daftar-approve-cuti')->with('success', 'Pengajuan cuti berhasil disetujui.');
    }
}
