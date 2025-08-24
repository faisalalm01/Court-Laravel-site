<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\CutiHistory;
use App\Models\Notification;
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

        // Data untuk admin
        if ($user->role === 'Admin' || $user->nip === '00') {
            $data = CutiPegawai::all();
            $cutiTahunIni = collect();
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

        // notifikasi
        if ($user->pegawai && $user->pegawai->jabatan->nama_jabatan === 'KETUA') {
            $query = Notification::where(function ($q) use ($user) {
                $q->where('id_user', $user->id_user)
                    ->orWhere('tipe', 'cuti_batas_jabatan');
            });
        } else {
            $query = Notification::where('id_user', $user->id_user);
        }
        $notifCount = $query->count();
        $notifications = $query->latest()->take(10)->get();

        return view('dashboard.user.dashboard', [
            'title' => $title,
            'data' => $data,
            'userCount' => $userCount,
            'pegawaiCount' => $pegawaiCount,
            'dataPeg' => $dataPeg,
            'cutiTahunIni' => $cutiTahunIni,
            'sisaCutiTahunan' => $sisaCutiTahunan,
            'jabatan' => $jabatan,
            'notifications' => $notifications,
            'notifCount' => $notifCount,
        ]);
    }
}
