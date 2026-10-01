<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg,#12213f,#1c3a63); min-height: 100vh; display:flex; align-items:center; justify-content:center; }
        .login-card { max-width: 420px; width: 100%; border: none; border-radius: 18px; box-shadow: 0 20px 50px rgba(0,0,0,.25); }
        .login-card img { width: 56px; height: 56px; object-fit: contain; }
    </style>
</head>
<body>
    <div class="card login-card p-4 m-3">
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="mb-2">
                <h4 class="fw-bold mb-0">{{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}</h4>
                <p class="text-muted small">Masuk ke Panel Admin</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('home') }}" class="small text-decoration-none"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke website</a>
            </div>
        </div>
    </div>
</body>
</html>
