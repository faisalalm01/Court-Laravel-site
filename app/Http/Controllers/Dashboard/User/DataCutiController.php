<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataCutiController extends Controller
{
    public function getPegawai()
    {

        $user = Auth::user();
        return  Pegawai::where('nip', $user->nip)->first();
    }
    public function showDataCutiDisetujui()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Disetujui')->get();
        return view('dashboard.user.data_cuti_disetujui', ['title' => 'Dashboard User | Data Cuti Disetujui', 'data' => $data]);
    }
    public function showDataCutiDitangguhkan()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Ditangguhkan')->get();
        return view('dashboard.user.data_cuti_ditangguhkan', ['title' => 'Dashboard User | Data Cuti Ditangguhkan', 'data' => $data]);
    }
    public function showDataCutiPerubahan()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Perubahan')->get();
        return view('dashboard.user.data_cuti_perubahan', ['title' => 'Dashboard User | Data Cuti Perubahan', 'data' => $data]);
    }
    public function showDataCutiTidakDisetujui()
    {
        $pegawai = $this->getPegawai();
        $data =  CutiPegawai::where('id_pegawai', $pegawai->id_pegawai)->where('status_cuti', 'Tidak Disetujui')->get();
        return view('dashboard.user.data_cuti_tidak_disetujui', ['title' => 'Dashboard User | Data Cuti Tidak Disetujui', 'data' => $data]);
    }
}
