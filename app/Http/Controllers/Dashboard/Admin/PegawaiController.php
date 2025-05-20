<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddPegawaiRequest;
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
        $golongan = Golongan::all();
        return view('dashboard.admin.data_pegawai', ['title' => 'Dashboard Admin | Data Pegawai', 'data' => $data, 'jabatan' => $jabatan, 'golongan' => $golongan]);
    }
    public function add(AddPegawaiRequest $request)
    {
        $validatedData = $request->validated();

        Pegawai::create([
            'nama_pegawai' => $validatedData['nama'],
            'nip' => $validatedData['nip'],
            'jabatan' => $validatedData['jabatan'],
            'golongan' => $validatedData['golongan'],
        ]);
        return redirect()->route('dashboard.admin.data-pegawai')->with(['success' => 'Data Pegawai Berhasil Disimpan!']);
    }
}
