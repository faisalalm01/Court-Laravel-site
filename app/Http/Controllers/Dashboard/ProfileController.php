<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pegawai = $user->pegawai()->with(['jabatan', 'golongan'])->first();
        return view('dashboard.profile', [
            'title' => 'Dashboard | Profile',
            'pegawai' => $pegawai,
            'user' => $user,
        ]);
    }
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'nip' => 'required|exists:user,nip',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $user = User::where('nip', $request->nip)->first();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'images/profile/';

            if ($user->foto && file_exists(public_path($path . $user->foto))) {
                unlink(public_path($path . $user->foto));
            }
            $file->move(public_path($path), $filename);
            $user->foto = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto Profile berhasil diperbarui.');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = \App\Models\User::where('nip', $request->nip)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $user->password = md5($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil direset.');
    }
}
