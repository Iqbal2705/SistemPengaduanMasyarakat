@extends('layouts.staff')

@section('title', 'Dashboard Staff')

@section('content')
    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="mb-4">
            <h3 class="fw-bold">Dashboard Staff</h3>
            <p class="text-muted">
                Selamat datang, <strong>{{ auth()->user()->name }}</strong>
            </p>
        </div>

        {{-- INFO BOX --}}
        <div class="row">

            {{-- TOTAL PENGADUAN --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $totalPengaduan ?? 0 }}</h3>
                        <p>Total Pengaduan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
            </div>

            {{-- PENGADUAN BARU --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $pengaduanBaru ?? 0 }}</h3>
                        <p>Pengaduan Baru</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>

            {{-- SEDANG DIPROSES --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $pengaduanProses ?? 0 }}</h3>
                        <p>Sedang Diproses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                </div>
            </div>

            {{-- SELESAI --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $pengaduanSelesai ?? 0 }}</h3>
                        <p>Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>

        </div>

        {{-- AKSI CEPAT --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold">Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('staff.pengaduan.index') }}" class="btn btn-primary me-2">
                            <i class="fas fa-list"></i> Lihat Pengaduan
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection