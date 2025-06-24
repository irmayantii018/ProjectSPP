<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Tampilkan semua siswa
    public function index()
    {
        $siswas = Siswa::all();
        return view('data', compact('siswas'));
    }

    // Tampilkan form tambah siswa
    public function create()
    {
        return view('create');
    }

    // Simpan data siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'nullable',
        ]);

        // Hanya kirim field yang diizinkan
        Siswa::create($request->only(['nis', 'nama', 'kelas', 'alamat']));

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // Tampilkan detail satu siswa (jika diperlukan)
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    // Tampilkan form edit siswa
    public function edit(Siswa $siswa)
    {
        return view('edit', compact('siswa'));
    }

    // Simpan perubahan data siswa
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'nullable',
        ]);

        // Hanya kirim field yang diizinkan
        $siswa->update($request->only(['nis', 'nama', 'kelas', 'alamat']));

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Hapus data siswa
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
