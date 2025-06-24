<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mb-4">Registrasi</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.proses') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Sandi</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Daftar Sebagai</label>
            <select name="role" class="form-select" required>
                <option value="orangtua">Orang Tua</option>
                <option value="bendahara">Bendahara</option>
                <option value="kepala_sekolah">Kepala Sekolah</option>
            </select>

        </div>

        <button type="submit" class="btn btn-success w-100">Daftar</button>
    </form>

    <p class="text-center mt-3">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
    </p>
</div>
</body>
</html>
