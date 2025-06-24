@extends('layout.master')
@section('title', 'Dashboard Kepala Sekolah')
@section('content')

<div class="container mt-4">
    <h2 class="text-center text-primary mb-3">Dashboard Kepala Sekolah</h2>
    <p class="text-center">Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Anda login sebagai <strong>{{ Auth::user()->role }}</strong>.</p>

    {{-- Statistik --}}
    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5>Total Siswa</h5>
                    <h3>{{ $totalSiswa ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5>Pembayaran Bulan Ini</h5>
                    <h4>Rp {{ number_format($pembayaranBulanIni ?? 0, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5>Transaksi Sukses</h5>
                    <h3>{{ $totalTransaksi ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5>Laporan Tersedia</h5>
                    <h3>{{ $totalLaporan ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Aksi: hanya lihat --}}
    <div class="text-center mt-4">
        <a href="{{ route('laporan.index') }}" class="btn btn-outline-info mx-2">
            <i class="bi bi-bar-chart-line"></i> Lihat Semua Laporan
        </a>
    </div>
</div>

@endsection
