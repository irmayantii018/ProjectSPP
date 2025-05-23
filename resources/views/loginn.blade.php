<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('impact/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('impact/assets/css/kaiadmin.min.css') }}">
</head>
<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Login</h3>
            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <!-- Role Dropdown -->
                <div class="form-group">
                    <label for="role" class="placeholder"><b>Pilih Role</b></label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                        <option value="orangtua">Orangtua</option>
                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Email</b></label>
                    <input id="email" name="email" type="email" class="form-control" required autofocus>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
                    <input id="password" name="password" type="password" class="form-control" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="form-group form-action-d-flex mb-3">
                    <button type="submit" class="btn btn-primary btn-block w-100">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('impact/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('impact/assets/js/core/bootstrap.min.js') }}"></script>
</body>
</html>
