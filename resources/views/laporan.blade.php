@extends('layout.master')
@section('title', 'Laporan')

@section('content')
<h1 class="h2 mb-4">Laporan Pembayaran</h1>

<form class="row g-3 mb-4" method="GET" action="{{ route('laporan.index') }}">
  <div class="col-md-4">
    <label class="form-label">Bulan</label>
    <select name="bulan" class="form-select">
      <option value="">-- Pilih Bulan --</option>
      @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $b)
        <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>{{ $b }}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label">Tahun</label>
    <input type="number" name="tahun" class="form-control" value="{{ request('tahun', date('Y')) }}">
  </div>

  <div class="col-md-4 d-flex align-items-end">
    <button type="submit" class="btn btn-success">Tampilkan</button>
  </div>
</form>

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(isset($pembayarans) && count($pembayarans) > 0)
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Bulan</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pembayarans as $p)
        <tr style="cursor: pointer;" onclick="window.location='{{ route('pembayaran.show', $p->id) }}'">
          <td>{{ $p->nis }}</td>
          <td>{{ $p->nama }}</td>
          <td>{{ $p->bulan }}</td>
          <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}</td>
          <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <div class="alert alert-warning">Tidak ada data pembayaran ditemukan untuk filter yang dipilih.</div>
@endif

@endsection
