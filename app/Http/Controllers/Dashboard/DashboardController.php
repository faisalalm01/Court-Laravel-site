<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
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
        $userCount = $user::count();
        $pegawaiCount = $pegawai::count();
        if (!$pegawai) {
            return view('cuti.index', [
                'title' => $title,
                'data' => [],
                'message' => 'Pegawai tidak ditemukan',
            ]);
        }
        if ($user->role === 'Admin') {
            $data =  CutiPegawai::All();
        } else {
            $data = CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Diajukan')->get();
        }
        return view('dashboard.user.dashboard', ['title' => $title, 'data' =>  $data, 'userCount' => $userCount, 'pegawaiCount' => $pegawaiCount, 'dataPeg' => $dataPeg]);
    }
}
