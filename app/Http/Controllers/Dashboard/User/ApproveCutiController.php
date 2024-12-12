<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
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
                ->where('ketua', $nip)
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
}
