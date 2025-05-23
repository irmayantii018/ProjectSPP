<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class orangtua extends Controller
{
  public function login()
    {
        return view('layouts.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Arahkan berdasarkan role
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'petugas') {
                return redirect()->route('petugas.dashboard');
            } elseif ($user->role == 'siswa') {
                return redirect()->route('siswa.dashboard');
            }

            // Fallback jika role tidak dikenali
            Auth::logout();
            return redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']);
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
