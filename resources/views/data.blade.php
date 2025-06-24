@extends('layout.master')

@section('title', 'Data Siswa')

@section('content')
<div class="container mt-4">
    <h2>Data Siswa</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($siswas->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Belum ada data siswa.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection  