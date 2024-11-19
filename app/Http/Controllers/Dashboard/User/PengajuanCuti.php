<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanCuti extends Controller
{
    public function index()
    {
        $user  = Auth::user();
        $data =  CutiPegawai::find('id_pegawai', $user->id_user)->get();
        return view('dashboard.user.daftar_cuti');
    }
}
