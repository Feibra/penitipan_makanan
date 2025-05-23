<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Catatan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }

        .navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e0e0e0;
        }

        .navbar-brand,
        .nav-link {
            color: #333 !important;
        }

        .nav-link:hover {
            color: #198754 !important;
        }

        .table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }

        .card {
            border-radius: 12px;
            border: none;
        }

        .card-header {
            font-weight: 600;
            background-color: #e9f7ef;
            color: #198754;
            border-bottom: 2px solid #d4edda;
        }

        .dropdown-menu {
            border-radius: 10px;
        }

        footer {
            background-color: #ffffff;
            border-top: 1px solid #e0e0e0;
            padding: 1rem 0;
        }

        /* Button enhancement */
        .btn-primary {
            background-color: #198754;
            border-color: #198754;
        }

        .btn-primary:hover {
            background-color: #157347;
            border-color: #157347;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 text-capitalize">

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fs-5 fw-bold"><b>{{ Auth::user()->name }}</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catatan.index') }}">Catatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('toko.index') }}">Toko</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->email }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li><a class="dropdown-item">Role : {{ Auth::user()->role }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('actionlogout') }}"><i class="fa fa-sign-out-alt"></i> Log Out</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

@yield('footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
