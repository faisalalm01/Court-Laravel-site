<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\CutiPegawai;
use App\Models\Jabatan;

class XampleController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        $nip = $request->nip;
        // $password = $request->password;
        $password = md5($request->password); // Menggunakan MD5 sementara

        // Cari pengguna berdasarkan NIP
        // $user = User::where('nip', $nip)->first();
        $user = User::where('nip', $nip)->where('password', $password)->first();

        if ($user) {
            // Set session Laravel
            Session::put('nip', $user->nip);
            Session::put('role', $user->role);

            // Redirect berdasarkan role
            if ($user->role === 'Admin') {
                return view('admin.index')->with('success', 'Login Berhasil');
            } elseif ($user->role === 'User') {
                return view('user.index')->with('success', 'Login Berhasil');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Logout Berhasil');
    }

    public function index()
    {
        // Periksa apakah user sudah login dan apakah role-nya user
        if (Session::get('role') !== 'User') {
            return redirect()->route('admin.index');
        }

        $nip = Session::get('nip');

        // Ambil data pengguna dan jabatan
        $user = User::where('nip', $nip)->first();
        $jabatanpegawai = Jabatan::where('nip', $nip)->first();

        // Ambil data cuti sesuai dengan jabatan pegawai
        $cuti_pegawai = CutiPegawai::where('nip', $nip)->where('status_cuti', 'Diajukan')->get();

        return view('user.index', compact('user', 'jabatanpegawai', 'cuti_pegawai'));
    }
}
