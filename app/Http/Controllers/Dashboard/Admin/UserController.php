<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddUserRequest;
use App\Http\Requests\Admin\EditUserRequest;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        $pegawai = Pegawai::all();
        return view('dashboard.admin.data_users', ['title' => 'Dashboard Admin | Data Users', 'data' => $data, 'pegawai' => $pegawai]);
    }
    public function addUser(AddUserRequest $request)
    {
        $validatedData = $request->validated();
        $existingUser = User::where('nip', $validatedData['nip'])->first();
        if ($existingUser) {
            return redirect()->back()->with(['error' => 'Pegawai sudah terdaftar Sebagai User!']);
        }
        User::create([
            'nip' => $validatedData['nip'],
            'password' => md5($validatedData['password']),
            'role' => $validatedData['role'],
            'status' => 'active'
        ]);
        return redirect()->route('dashboard.admin.data-users')->with(['success' => 'Data User Berhasil Disimpan!']);
    }
    public function editUser(EditUserRequest $request, $nip)
    {
        $validatedData = $request->validated();
        $user = User::where('nip', $nip)->first();
        if (isset($validatedData['password'])) {
            $user->password = md5($validatedData['password']);
        }
        if (isset($validatedData['role'])) {
            $user->role = $validatedData['role'];
        }
        if (isset($validatedData['status'])) {
            $user->status = $validatedData['status'];
        }
        $user->save();
        return redirect()->route('dashboard.admin.data-users')->with(['success' => 'Data User Berhasil Diubah!']);
    }
    public function toggleStatus($nip)
    {
        $user = User::where('nip', $nip)->firstOrFail();

        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return redirect()->route('dashboard.admin.data-users')
            ->with(['success' => 'Status user berhasil diubah menjadi ' . $user->status . '!']);
    }
}
