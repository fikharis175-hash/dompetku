<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DompetKu')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/dompetku.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div class="app-shell">
    <aside class="sidebar" aria-label="Navigasi utama">
        <a class="brand" href="{{ route('dashboard') }}" aria-label="DompetKu Dashboard">
            <img src="{{ asset('images/logo.png') }}" alt="Logo DompetKu" class="brand-mark">
        </a>

        <div class="nav-label">Menu Utama</div>
        <nav class="side-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" @if(request()->routeIs('dashboard')) aria-current="page" @endif>
                <i class="bi bi-grid-1x2-fill"></i><span class="nav-text">Dashboard</span>
            </a>
            <a href="{{ route('transactions.index') }}" class="{{ request()->routeIs('transactions.index') ? 'active' : '' }}" @if(request()->routeIs('transactions.index')) aria-current="page" @endif>
                <i class="bi bi-list-ul"></i><span class="nav-text">Transaksi</span>
            </a>
            <a href="{{ route('transactions.create') }}" class="{{ request()->routeIs('transactions.create') ? 'active' : '' }}" @if(request()->routeIs('transactions.create')) aria-current="page" @endif>
                <i class="bi bi-plus-circle-fill"></i><span class="nav-text">Tambah Transaksi</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="profile-link">
                <span class="avatar"><i class="bi bi-person-fill"></i></span>
                <span class="profile-details">
                    <span class="d-block profile-name">Pengguna</span>
                    <span class="d-block profile-sub">Akun DompetKu</span>
                </span>
            </div>
        </div>
    </aside>

    <main class="main-area">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        <div class="@yield('content_wrapper_class', 'content-wrap')">
            @yield('content')
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>