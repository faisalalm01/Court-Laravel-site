<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\CutiHistory;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataPeg = Pegawai::all();
        $pegawai = Pegawai::where('nip', $user->nip)->first();
        $title = $user->role === 'Admin' ? 'Dashboard Admin' : 'Dashboard User';
        $userCount = \App\Models\User::count(); // jumlah user dari model User
        $pegawaiCount = $dataPeg->count();
        $jabatan = Auth::user()->pegawai->jabatan->nama_jabatan ?? '';
        // Jika user tidak terkait pegawai
        if (!$pegawai && $user->role !== 'Admin') {
            return view('cuti.index', [
                'title' => $title,
                'data' => [],
                'message' => 'Pegawai tidak ditemukan',
            ]);
        }

        // Data untuk admin
        if ($user->role === 'Admin' || $user->nip === '00') {
            $data = CutiPegawai::all();
            $cutiTahunIni = collect(); // admin tidak punya cuti personal
        } else {
            // Data untuk user (biasa atau Ketua)
            $data = CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)
                ->where('status_cuti', 'Diajukan')
                ->get();

            // Ambil cuti tahun ini berdasarkan id_pegawai dan tahun sekarang
            $cutiTahunIni = CutiHistory::where('id_pegawai', $pegawai->id_pegawai)
                ->where('tahun', now()->year)
                ->get();
        }

        $sisaCutiTahunan = CutiHistory::getSisaCutiTahunan($pegawai->id_pegawai);

        return view('dashboard.user.dashboard', [
            'title' => $title,
            'data' => $data,
            'userCount' => $userCount,
            'pegawaiCount' => $pegawaiCount,
            'dataPeg' => $dataPeg,
            'cutiTahunIni' => $cutiTahunIni,
            'sisaCutiTahunan' => $sisaCutiTahunan,
            'jabatan' => $jabatan
        ]);
    }

    public function getCutiByNip($nip)
    {
        $user = Auth::user();
        $pegawai = $user->pegawai;

        if (!$pegawai) {
            return response()->json(['error' => 'Pegawai tidak ditemukan'], 404);
        }

        $cuti = CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->get();

        return view('dashboard.admin.dashboard', [
            'pegawai' => $pegawai,
            'cuti' => $cuti
        ]);
    }
}