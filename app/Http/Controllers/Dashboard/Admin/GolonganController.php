<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddGolonganRequest;
use App\Models\Golongan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all();
        return view('dashboard.admin.data_golongan', ['title' => 'Dashboard Admin | Data Golongan', 'data' => $golongan]);
    }
    public function add(AddGolonganRequest $request)
    {
        $validatedData = $request->validated();

        Golongan::create([
            'nama_golongan' => $validatedData['nama_golongan'],
        ]);
        return redirect()->route('dashboard.admin.data-golongan')->with(['success' => 'Data Golongan Berhasil Disimpan!']);
    }

    public function edit(Request $request)
    {

        $request->validate([
            'id_golongan' => 'required|exists:golongan,id_golongan',
            'nama_golongan' => 'required|string|max:255',
        ]);

        Golongan::find($request->id_golongan)->update([
            'nama_golongan' => $request->nama_golongan,
        ]);

        return redirect()->route('dashboard.admin.data-golongan')->with('success', 'Data Golongan berhasil diubah!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id_golongan' => 'required|exists:golongan,id_golongan',
        ]);

        // Hapus data pegawai
        Pegawai::where('id_golongan', $request->id_golongan)->delete();

        return redirect()->route('dashboard.admin.data-pegawai')->with('success', 'Data golongan Berhasil Dihapus!');
    }
}
