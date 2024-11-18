<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CutiPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'Admin') {
            $title = 'Dashboard Admin Page';
            $data =  CutiPegawai::all();
        } else {
            $title = 'Dashboard User Page';
            $data =  CutiPegawai::find('id_pegawai', $user->id_user)->get();
        }
        return view('dashboard.user.dashboard', ['title' => $title, 'data' =>  $data]);
    }
}
