<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\KgbPegawai;
use App\Models\KnpPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{

    public function getUser()
    {
        return Auth::user();
    }
    public function showDaftarCuti()
    {
        $user =  $this->getUser();
        $data =  CutiPegawai::find('id_pegawai', $user->id_user)->get();
        return view('dashboard.user.daftar_cuti', ['title' => 'Dashbaord User | Daftar Cuti', 'data' => $data]);
    }
    public function showDaftarKGB()
    {
        $user =  $this->getUser();
        $data =  KgbPegawai::find('id_pegawai', $user->id_user)->get();
        return view('dashboard.user.daftar_kgb', ['title' => 'Dashbaord User | Daftar KGB', 'data' => $data]);
    }
    public function showDaftarKNP()
    {
        $user =  $this->getUser();
        $data =  KnpPegawai::find('id_pegawai', $user->id_user)->get();
        return view('dashboard.user.daftar_knp', ['title' => 'Dashbaord User | Daftar KNP', 'data' => $data]);
    }
}
