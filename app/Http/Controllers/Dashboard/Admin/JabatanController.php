<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddJabatanRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('dashboard.admin.data_jabatan', ['title' => 'Dashboard Admin | Data Jabatan', 'data' => $jabatan]);
    }
    public function add(AddJabatanRequest $request)
    {
        $validatedData = $request->validated();

        Jabatan::create([
            'nama_jabatan' => $validatedData['nama_jabatan'],
        ]);
        return redirect()->route('dashboard.admin.data-jabatan')->with(['success' => 'Data Jabatan Berhasil Disimpan!']);
    }
}
