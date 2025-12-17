<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SPM | Sistem Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
</head>
<body class="layout-top-nav">
<div class="wrapper">

    {{-- NAVBAR --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <div class="container">
            <a href="/pengaduan" class="navbar-brand">
                <strong>SPM</strong>
            </a>
        </div>
    </nav>

    {{-- CONTENT --}}
    <div class="content-wrapper">
        <div class="content pt-5">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="main-footer text-center">
        <strong>Sistem Pengaduan Masyarakat</strong> © {{ date('Y') }}
    </footer>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
