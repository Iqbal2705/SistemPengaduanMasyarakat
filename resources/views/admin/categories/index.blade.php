@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-12">
                <h1 class="m-0">Master Data Sistem</h1>
                <p class="text-muted">Pilih modul yang ingin dikelola</p>
            </div>
        </div>

        <div class="row">

            {{-- STAFF --}}
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Staff</h3>
                        <p>Kelola akun staff</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="/admin/staff" class="small-box-footer">
                        Kelola <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            {{-- GUEST --}}
            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Guest</h3>
                        <p>Data masyarakat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="/admin/guest" class="small-box-footer">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            {{-- PENGADUAN --}}
            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Pengaduan</h3>
                        <p>Laporan masyarakat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="/admin/pengaduan" class="small-box-footer">
                        Proses <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>


            {{-- LAPORAN --}}
            <div class="col-lg-4 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>Laporan</h3>
                        <p>Rekap pengaduan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <a href="/admin/laporan" class="small-box-footer">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            {{-- PENGATURAN --}}
            <div class="col-lg-4 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>Pengaturan</h3>
                        <p>Konfigurasi sistem</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <a href="/admin/pengaturan" class="small-box-footer">
                        Atur <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection