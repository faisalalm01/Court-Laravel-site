<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all();
        return view('dashboard.admin.data_golongan', ['title' => 'Dashboard Admin | Data Golongan', 'golongan' => $golongan]);
    }
}
