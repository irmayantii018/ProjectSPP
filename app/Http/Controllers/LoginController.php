<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function index()
    {
        return view('autentikasi.login'); // Pastikan view ini ada
    }

    /**
     * Memproses login pengguna.
     */
    public function login(Request $request)
    {
        // ✅ Validasi dengan pesan kustom
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Email harus diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Kata sandi harus diisi.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('ingat'))) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            // Redirect berdasarkan role
            switch ($role) {
                case 'bendahara':
                    return redirect()->route('dashboard');
                case 'orangtua':
                    return redirect()->route('dasboardortu');
                case 'kepala_sekolah':
                    return redirect()->route('dasboardkpl');
                default:
                    return redirect('/');
            }
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout pengguna dan akhiri sesi.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
