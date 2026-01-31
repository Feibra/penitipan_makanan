<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Aplikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4f46e5, #06b6d4);
            min-height: 100vh;
        }
        .register-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
        }
        .btn-primary {
            background-color: #4f46e5;
            border: none;
        }
        .btn-primary:hover {
            background-color: #4338ca;
        }
    </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-lg-4 col-md-6 col-sm-10">
        <div class="card register-card p-4">
            <div class="card-body">

                <h3 class="text-center mb-2 fw-bold">Buat Akun</h3>
                <p class="text-center text-muted mb-4">Silakan daftar untuk melanjutkan</p>

                <!-- Alert Success -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('actionregister') }}" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            placeholder="example@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label">Kata Sandi</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Minimal 8 karakter">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Daftar
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <small class="text-muted">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">
                            Login
                        </a>
                    </small>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
