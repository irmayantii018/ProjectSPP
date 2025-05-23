<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampil_regis()
    {
        return view('layouts.regis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function kirim_data(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data ke database
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            // 'role'     => 'user', // pastikan kolom 'role' ada di tabel users
        ]);

        // Login user
        Auth::login($user);

        // Redirect ke halaman utama
        return redirect('/');
    }

    public function show(regis $regis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(regis $regis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, regis $regis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(regis $regis)
    {
        //
    }
}
