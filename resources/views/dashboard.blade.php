{{-- resources/views/dashboard.blade.php --}}
@extends('layout.master')
@section('title', 'Dashboard Bendahara')
@section('content')

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">Dashboard Bendahara</h2>
        <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Anda login sebagai <strong>{{ Auth::user()->role }}</strong>.</p>
    </div>

    <div class="row text-center">
        <div class="col-md-3 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h6>Total Siswa</h6>
                    <h3 class="text-primary">{{ $totalSiswa ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h6>Pembayaran Bulan Ini</h6>
                    <h4 class="text-success">Rp {{ number_format($pembayaranBulanIni ?? 0, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-info shadow-sm">
                <div class="card-body">
                    <h6>Transaksi Sukses</h6>
                    <h3 class="text-info">{{ $totalTransaksi ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                    <h6>Laporan Tersedia</h6>
                    <h3 class="text-warning">{{ $totalLaporan ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('siswa.index') }}" class="btn btn-outline-primary mx-2">Kelola Data Siswa</a>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-success mx-2">Input Pembayaran</a>
        <a href="{{ route('laporan.index') }}" class="btn btn-outline-info mx-2">Lihat Laporan</a>
    </div>
</div>
@endsection
