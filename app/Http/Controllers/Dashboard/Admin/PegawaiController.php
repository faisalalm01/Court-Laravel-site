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
            'id_jabatan' => $validatedData['jabatan'],
            'id_golongan' => $validatedData['golongan'],
        ]);
        return redirect()->route('dashboard.admin.data-pegawai')->with(['success' => 'Data Pegawai Berhasil Disimpan!']);
    }

    public function edit(Request $request)
    {

        $request->validate([
            'nip' => 'required|exists:pegawai,nip',
            'pegawai' => 'required|string|max:255',
            'jabatan' => 'required|exists:jabatan,id_jabatan',
            'golongan' => 'required|exists:golongan,id_golongan',
        ]);

        $pegawai = Pegawai::where('nip', $request->nip)->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Pegawai tidak ditemukan.');
        }

        $pegawai->update([
            'nama_pegawai' => $request->pegawai,
            'id_jabatan' => $request->jabatan,
            'id_golongan' => $request->golongan,
        ]);

        return redirect()->route('dashboard.admin.data-pegawai')->with('success', 'Data Pegawai berhasil diupdate!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
        ]);

        // Hapus data pegawai
        Pegawai::where('id_pegawai', $request->id_pegawai)->delete();

        return redirect()->route('dashboard.admin.data-pegawai')->with('success', 'Data Pegawai Berhasil Dihapus!');
    }
}
