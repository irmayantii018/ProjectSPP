@extends('layout.master')

@section('title', 'Edit Siswa')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Siswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $siswa->kelas) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
