<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function tampil_regis()
    {
        return view('autentikasi.register');
    }

    /**
     * Proses kirim data registrasi.
     */
    public function kirim_data(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|in:bendahara,orangtua,kepala_sekolah',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // Setelah registrasi, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Fungsi tambahan resource (opsional)
    public function create() {}
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
