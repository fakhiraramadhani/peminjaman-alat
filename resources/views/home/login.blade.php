<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Peminjaman Alat</title>
    <link rel="stylesheet" href="https://cloudflare.com">
    <link rel="stylesheet" href="https://jsdelivr.net">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary shadow">
        <div class="card-header text-center">
            <a href="#" class="h3"><b>Peminjaman</b> Alat</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Silakan masuk untuk memulai sesi Anda</p>

            @if(session('success'))
                <div class="alert alert-success text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Masuk (Login)</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://jquery.com"></script>
<script src="https://jsdelivr.net"></script>
<script src="https://jsdelivr.net"></script>
</body>
</html>
