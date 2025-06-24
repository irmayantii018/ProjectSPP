@extends('layout.master')
@section('title', 'Pembayaran')

@section('content')
<h1 class="h2 mb-4">Transaksi Pembayaran SPP</h1>

{{-- Notifikasi sukses --}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Menampilkan error validasi --}}
@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('pembayaran.store') }}">
  @csrf

  {{-- Pilih Siswa --}}
  <div class="mb-3">
    <label class="form-label">Pilih Siswa</label>
    <select name="siswa_id" class="form-select" required>
      <option value="">-- Pilih Siswa --</option>
      @foreach($siswas as $siswa)
        <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
          {{ $siswa->nis }} - {{ $siswa->nama }}
        </option>
      @endforeach
    </select>
  </div>

  {{-- Bulan --}}
  <div class="mb-3">
    <label class="form-label">Bulan</label>
    <select class="form-select" name="bulan" required>
      <option value="">-- Pilih Bulan --</option>
      @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
        <option value="{{ $bulan }}" {{ old('bulan') == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
      @endforeach
    </select>
  </div>

  {{-- Tanggal Pembayaran --}}
  <div class="mb-3">
    <label class="form-label">Tanggal Pembayaran</label>
    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
  </div>

  {{-- Jumlah Bayar --}}
  <div class="mb-3">
    <label class="form-label">Jumlah Bayar</label>
    <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah pembayaran" value="{{ old('jumlah') }}" required>
  </div>

  {{-- Tombol Submit --}}
  <button type="submit" class="btn btn-primary">Bayar</button>
</form>
@endsection
