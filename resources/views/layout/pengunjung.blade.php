<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengunjung Panel - Catatan Penjualan</title>
    
    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Style Modern & Soft -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
        }

        .navbar {
            background: linear-gradient(45deg, #ffffff, #e3f2fd);
        }

        .navbar-brand, .nav-link, .dropdown-item {
            transition: all 0.3s ease;
        }

        .nav-link:hover, .dropdown-item:hover {
            background-color: #e0f7fa;
            border-radius: 5px;
        }

        .table {
            table-layout: fixed;
            width: 100%;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .dropdown-menu {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #ffffff;
            color: #6c757d;
        }

        /* Responsive padding container */
        .container {
            padding-top: 1rem;
            padding-bottom: 2rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 text-capitalize">

<nav class="navbar navbar-expand-lg navbar-light shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary">👤 {{ Auth::user()->name }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.dashboard') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.catatan') }}"><i class="fas fa-clipboard-list me-1"></i>Catatan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.toko') }}"><i class="fas fa-store me-1"></i>Toko</a></li>
            </ul>

            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->email }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item">Role: {{ Auth::user()->role }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('actionlogout') }}"><i class="fas fa-sign-out-alt me-1"></i>Log Out</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

@yield('footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
