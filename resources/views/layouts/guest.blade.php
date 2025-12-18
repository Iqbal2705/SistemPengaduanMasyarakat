<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Pengaduan Masyarakat')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">SPM</a>
        <div class="navbar-nav">
            <a class="nav-link" href="/">Beranda</a>
            <a class="nav-link" href="/pengaduan">Buat Pengaduan</a>
            <a class="nav-link" href="/cek">Cek Pengaduan</a>
        </div>
    </div>
</nav>

<div class="container my-4">
    @yield('content')
</div>

<footer class="bg-light text-center py-3 mt-5">
    <small>© {{ date('Y') }} Sistem Pengaduan Masyarakat</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
