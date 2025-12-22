<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Pengaduan Masyarakat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            min-height: 100vh;
            color: #fff;
        }

        .card-role {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .card-role:hover {
            transform: translateY(-8px);
        }

        .icon-role {
            font-size: 60px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">

        <div class="text-center mb-5">
            <h1 class="fw-bold">Sistem Pengaduan Masyarakat</h1>
            <p class="lead">Silakan pilih peran Anda untuk melanjutkan</p>
        </div>

        <div class="row g-4 justify-content-center">

            {{-- ADMIN --}}
            <div class="col-md-4">
                <div class="card card-role shadow text-center p-4 bg-danger text-white">
                    <div class="icon-role">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h4 class="fw-bold">Admin</h4>
                    <p>Mengelola sistem dan data pengaduan</p>
                    <a href="{{ route('login') }}" class="btn btn-light fw-bold">
                        Masuk sebagai Admin
                    </a>
                </div>
            </div>

            {{-- STAFF --}}
            <div class="col-md-4">
                <div class="card card-role shadow text-center p-4 bg-warning text-dark">
                    <div class="icon-role">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <h4 class="fw-bold">Staff</h4>
                    <p>Memproses dan membalas pengaduan</p>
                    <a href="{{ route('login') }}" class="btn btn-dark fw-bold">
                        Masuk sebagai Staff
                    </a>
                </div>
            </div>

            {{-- GUEST --}}
            <div class="col-md-4">
                <div class="card card-role shadow text-center p-4 bg-success text-white">
                    <div class="icon-role">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="fw-bold">Masyarakat</h4>
                    <p>Buat dan cek pengaduan</p>
                    <a href="{{ route('guest.index') }}" class="btn btn-light fw-bold">
                        Masuk sebagai Guest
                    </a>
                </div>
            </div>

        </div>

        <footer class="mt-5 text-center">
            <small>© {{ date('Y') }} Sistem Pengaduan Masyarakat</small>
        </footer>

    </div>

</body>

</html>