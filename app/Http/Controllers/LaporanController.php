<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class LaporanController extends Controller
{
    /**
     * Tampilkan laporan pembayaran (default bulan ini atau dari request)
     */
    public function index(Request $request)
    {
        // Ambil bulan & tahun dari request, jika tidak ada pakai default (bulan sekarang)
        $bulan = $request->bulan ?? now()->format('F'); // Contoh: "Juni"
        $tahun = $request->tahun ?? now()->year;

        $query = Pembayaran::with('siswa');

        // Jika ada filter bulan
        if ($bulan) {
            $query->whereMonth('tanggal', date_parse($bulan)['month']);
        }

        // Jika ada filter tahun
        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        $pembayarans = $query->orderBy('tanggal', 'desc')->get();

        return view('laporan', compact('pembayarans', 'bulan', 'tahun'));
    }

    /**
     * Filter laporan via form (opsional jika ingin pisahkan)
     */
    public function filter(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required|numeric',
        ]);

        return redirect()->route('laporan.index', [
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);
    }
}
