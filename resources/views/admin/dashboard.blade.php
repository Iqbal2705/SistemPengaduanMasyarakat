@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1">Dashboard Admin</h3>
                        <p class="text-muted mb-0">
                            Selamat datang,
                            <strong>{{ auth()->user()->name }}</strong>
                        </p>
                    </div>
                    <span class="badge bg-primary px-3 py-2">
                        {{ strtoupper(auth()->user()->role) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="bi bi-people-fill fs-1 text-primary"></i>
                    <h5 class="mt-2">Total User</h5>
                    <h3 class="fw-bold">{{ $totalUser }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="bi bi-file-text-fill fs-1 text-warning"></i>
                    <h5 class="mt-2">Total Pengaduan</h5>
                    <h3 class="fw-bold">{{ $totalPengaduan }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="bi bi-check-circle-fill fs-1 text-success"></i>
                    <h5 class="mt-2">Pengaduan Selesai</h5>
                    <h3 class="fw-bold">{{ $pengaduanSelesai }}</h3>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
