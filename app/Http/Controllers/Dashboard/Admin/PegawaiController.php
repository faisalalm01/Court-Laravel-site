<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::all();
        $jabatan = Jabatan::all();
        $golongans = Golongan::all();
        return view('dashboard.admin.data_pegawai', ['title' => 'Dashboard Admin | Data Pegawai', 'data' => $data, 'jabatan' => $jabatan, 'golongans' => $golongans]);
    }
}
