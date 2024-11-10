<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'Admin') {
            $title = 'Dashboard Admin Page';
        } else {
            $title = 'Dashboard User Page';
        }
        return view('dashboard.user.daftar_cuti', ['title' => $title]);
    }
}
