@extends('layout.master')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container mt-4">
    <h2>Tambah Data Siswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
