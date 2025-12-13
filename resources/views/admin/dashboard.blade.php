@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        {{-- Header --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="mb-1">Dashboard Admin</h3>
                            <p class="text-muted mb-0">
                                Selamat datang kembali,
                                <strong>{{ auth()->user()->name }}</strong> 👋
                            </p>
                        </div>
                        <span class="badge bg-primary fs-6 px-3 py-2">
                            {{ strtoupper(auth()->user()->role) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistik --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h1 class="mb-2 text-primary">
                            <i class="bi bi-people-fill"></i>
                        </h1>
                        <h5>Total User</h5>
                        <h3 class="fw-bold">0</h3>
                        <small class="text-muted">Admin, Staff & Masyarakat</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h1 class="mb-2 text-warning">
                            <i class="bi bi-file-text-fill"></i>
                        </h1>
                        <h5>Total Pengaduan</h5>
                        <h3 class="fw-bold">0</h3>
                        <small class="text-muted">Semua laporan masuk</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h1 class="mb-2 text-success">
                            <i class="bi bi-check-circle-fill"></i>
                        </h1>
                        <h5>Pengaduan Selesai</h5>
                        <h3 class="fw-bold">0</h3>
                        <small class="text-muted">Sudah ditindaklanjuti</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection