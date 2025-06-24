<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Pembayaran;

class Dasboard extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        switch ($user->role) {
            case 'orangtua':
                return view('dasboardortu'); // Gantilah dengan nama blade yang benar

            case 'bendahara':
                $totalSiswa = Siswa::count();
                $pembayaranBulanIni = Pembayaran::whereMonth('tanggal', now()->month)->sum('jumlah');
                $totalTransaksi = Pembayaran::count();
                $totalLaporan = Pembayaran::select('bulan')->distinct()->count();

                return view('dashboard', compact(
                    'totalSiswa',
                    'pembayaranBulanIni',
                    'totalTransaksi',
                    'totalLaporan'
                ));

            case 'kepala_sekolah':
                return view('dasboardkpl');

            default:
                return abort(403, 'Akses ditolak. Role tidak dikenal.');
        }
    }
}
