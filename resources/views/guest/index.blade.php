@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')

<style>
    :root {
        --main-soft: #6b9080;
        --main-dark: #3a5a40;
        --text-main: #344e41;
    }

    .text-main {
        color: var(--text-main) !important;
    }

    .icon-soft {
        color: var(--main-soft);
    }

    .btn-soft {
        background-color: var(--main-soft);
        color: #fff;
        border-radius: 30px;
        padding: 10px 30px;
        border: none;
    }

    .btn-soft:hover {
        background-color: var(--main-dark);
        color: #fff;
    }

    .card-soft {
        background: #ffffff;
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .card-soft:hover {
        background: linear-gradient(135deg, #e3f1ec, #f7fbf9);
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    }
</style>

<div class="container">

    {{-- HERO --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-main">
            Sistem Pengaduan Masyarakat
        </h1>
        <p class="lead text-muted mt-3">
            Sampaikan laporan atau pengaduan Anda secara online dengan mudah, cepat, dan aman.
        </p>
    </div>

    {{-- MENU UTAMA --}}
    <div class="row justify-content-center g-4">

        {{-- BUAT PENGADUAN --}}
        <div class="col-md-5">
            <div class="card card-soft shadow-sm border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3 icon-soft">
                        <i class="fas fa-edit fa-3x"></i>
                    </div>
                    <h4 class="fw-bold text-main">Buat Pengaduan</h4>
                    <p class="text-muted">
                        Laporkan permasalahan yang Anda alami dengan mudah dan cepat.
                    </p>
                    <a href="/pengaduan" class="btn btn-soft mt-2">
                        Buat Pengaduan
                    </a>
                </div>
            </div>
        </div>

        {{-- CEK PENGADUAN --}}
        <div class="col-md-5">
            <div class="card card-soft shadow-sm border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3 icon-soft">
                        <i class="fas fa-search fa-3x"></i>
                    </div>
                    <h4 class="fw-bold text-main">Cek Pengaduan</h4>
                    <p class="text-muted">
                        Lihat status dan balasan dari pengaduan yang telah Anda kirimkan.
                    </p>
                    <a href="/cek" class="btn btn-soft mt-2">
                        Cek Pengaduan
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- INFO TAMBAHAN --}}
    <div class="row mt-5 text-center">
        <div class="col-md-4">
            <i class="fas fa-lock fa-2x icon-soft mb-2"></i>
            <p class="text-muted">Data Anda aman dan terlindungi</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-clock fa-2x icon-soft mb-2"></i>
            <p class="text-muted">Diproses secara cepat & transparan</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-headset fa-2x icon-soft mb-2"></i>
            <p class="text-muted">Ditangani oleh petugas resmi</p>
        </div>
    </div>

</div>
@endsection
