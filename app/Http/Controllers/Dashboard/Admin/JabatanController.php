<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('dashboard.admin.data_jabatan', ['title' => 'Dashboard Admin | Data Jabatan', 'jabatan' => $jabatan]);
    }
}
