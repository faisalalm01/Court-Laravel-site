<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\Golongan;
use App\Models\KgbPegawai;
use App\Models\KnpPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function showDaftarCuti()
    {
        $data =  CutiPegawai::all();
        return view('dashboard.admin.daftar_cuti', ['title' => 'Dashboard Admin | Daftar Cuti', 'data' => $data]);
    }
    public function showDaftarKGB()
    {

        $data =  KgbPegawai::all();
        $pegawai = Pegawai::all();
        return view('dashboard.admin.daftar_kgb', ['title' => 'Dashboard Admin | Daftar KGB', 'data' => $data, 'pegawai' => $pegawai]);
    }
    public function showDaftarKNP()
    {
        $data =  KnpPegawai::all();
        $golongan =  Golongan::all();
        $pegawai = Pegawai::all();
        return view('dashboard.admin.daftar_knp', ['title' => 'Dashboard Admin | Daftar KNP', 'data' => $data, 'golongan' => $golongan, 'pegawai' => $pegawai]);
    }
}
