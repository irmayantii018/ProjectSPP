<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;

class PembayaranController extends Controller
{
    /**
     * Menampilkan form input pembayaran.
     */
    public function index()
    {
        $siswas = Siswa::all(); // Ambil semua siswa untuk dropdown
        return view('pembayaran', compact('siswas'));
    }

    /**
     * Menyimpan data pembayaran.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'bulan'    => 'required',
            'tanggal'  => 'required|date',
            'jumlah'   => 'required|numeric|min:1',
        ]);

        // Ambil data siswa berdasarkan ID yang dipilih
        $siswa = Siswa::findOrFail($request->siswa_id);

        // Simpan ke tabel pembayaran
        Pembayaran::create([
            'siswa_id' => $siswa->id,
            'bulan'    => $request->bulan,
            'tanggal'  => $request->tanggal,
            'jumlah'   => $request->jumlah,
            'nis'      => $siswa->nis,   // Simpan untuk kemudahan pelacakan
            'nama'     => $siswa->nama,  // Simpan juga nama siswa
        ]);

        return redirect()->route('laporan.index')->with('success', 'Pembayaran berhasil disimpan.');
    }

    /**
     * Menampilkan laporan pembayaran.
     */
    public function laporan(Request $request)
    {
        $query = Pembayaran::with('siswa');

        // Filter berdasarkan bulan (opsional)
        if ($request->filled('bulan')) {
            $query->where('bulan', $request->bulan);
        }

        // Filter berdasarkan tahun (opsional)
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $pembayarans = $query->orderBy('tanggal', 'desc')->get();

        return view('laporan', compact('pembayarans'));
    }

    /**
     * Menampilkan detail pembayaran tertentu.
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::with('siswa')->findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }
}
