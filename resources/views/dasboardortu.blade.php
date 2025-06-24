@extends('layout.master2')
@section('title', 'Dashboard Orang Tua')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Dashboard Orang Tua</h2>
    <p class="text-center">Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Bayar SPP</h5>
                    <p class="card-text">Lakukan pembayaran bulanan Anda di sini.</p>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-success">Bayar SPP</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
            <div class="card border-info">
                <div class="card-body text-center">
                    <h5 class="card-title">Laporan Pembayaran</h5>
                    <p class="card-text">Lihat riwayat dan status pembayaran SPP.</p>
                    <a href="{{ route('laporan.index') }}" class="btn btn-info">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
