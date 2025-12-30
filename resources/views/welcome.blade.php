<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Pengaduan Masyarakat</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f6f5f2, #e9f0ec);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            color: #344e41;
        }

        /* HEADER */
        .hero-title {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .hero-subtitle {
            color: #5c6f68;
            max-width: 600px;
            margin: auto;
        }

        /* SLIDER */
        .carousel-img-wrapper {
            position: relative;
        }

        .carousel-img-wrapper img {
            max-height: 260px;
            object-fit: cover;
            filter: brightness(0.88) saturate(0.75);
            border-radius: 14px;
        }

        .carousel-img-wrapper::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 14px;
        }

        /* CARD ROLE */
        .card-role {
            border: 1px solid #dde5df;
            border-radius: 16px;
            background: #ffffff;
            transition: all 0.35s ease;
        }

        .card-role:hover {
            transform: translateY(-10px);
            background: linear-gradient(135deg, #dbe7e4, #edf6f9);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .icon-role {
            font-size: 56px;
            margin-bottom: 15px;
            color: #6b9080;
            transition: 0.3s;
        }

        .card-role:hover .icon-role {
            color: #3a5a40;
        }

        .btn-role {
            background: #6b9080;
            color: #fff;
            border-radius: 30px;
            padding: 8px 22px;
            border: none;
        }

        .btn-role:hover {
            background: #3a5a40;
            color: #fff;
        }

        footer {
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">

        <!-- HEADER -->
        <div class="text-center mb-4">
            <h1 class="hero-title">Sistem Pengaduan Masyarakat</h1>
            <p class="hero-subtitle">
                Wadah partisipasi masyarakat untuk menyampaikan aspirasi, keluhan,
                dan laporan secara transparan, terstruktur, dan bertanggung jawab.
            </p>
        </div>

        <!-- SLIDER -->
        <div id="infoCarousel" class="carousel slide mb-5 w-75" data-bs-ride="carousel" data-bs-interval="3500">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#infoCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#infoCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#infoCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner shadow-sm rounded-4">
                <div class="carousel-item active">
                    <div class="carousel-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216" class="d-block w-100"
                            alt="Pelayanan Publik">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c" class="d-block w-100"
                            alt="Diskusi Masyarakat">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786" class="d-block w-100"
                            alt="Laporan Publik">
                    </div>
                </div>
            </div>
        </div>

        <!-- ROLE CARD -->
        <div class="row g-4 justify-content-center w-100">

            <div class="col-md-4">
                <div class="card card-role text-center p-4">
                    <div class="icon-role">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h5 class="fw-bold">Administrator</h5>
                    <p>Mengelola sistem, memverifikasi pengaduan, dan memantau kinerja layanan.</p>
                    <a href="{{ route('login') }}" class="btn btn-role">
                        Masuk Admin
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-role text-center p-4">
                    <div class="icon-role">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <h5 class="fw-bold">Staff</h5>
                    <p>Menindaklanjuti pengaduan dan memberikan respon kepada masyarakat.</p>
                    <a href="{{ route('login') }}" class="btn btn-role">
                        Masuk Staff
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-role text-center p-4">
                    <div class="icon-role">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="fw-bold">Masyarakat</h5>
                    <p>Menyampaikan laporan dan memantau status pengaduan secara mandiri.</p>
                    <a href="{{ route('guest.index') }}" class="btn btn-role">
                        Buat Pengaduan
                    </a>
                </div>
            </div>

        </div>

        <footer class="mt-5 text-center">
            <small>© {{ date('Y') }} Sistem Pengaduan Masyarakat</small>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>