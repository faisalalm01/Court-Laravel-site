<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddGolonganRequest;
use App\Models\Golongan;
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
}
