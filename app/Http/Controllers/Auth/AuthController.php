<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', ['title' => 'Login Page']);
    }

    public function login(AuthLoginRequest $request)
    {
        $validatedData = $request->all();
        $user  = User::where('nip',  $validatedData['nip'])->first();
        if ($user && $user->password === md5($validatedData['password'])) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'NIP atau Password salah');
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
