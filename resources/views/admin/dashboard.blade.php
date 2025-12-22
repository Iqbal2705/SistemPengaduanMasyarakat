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
                        <h6 class="mt-2">Total User</h6>
                        <h3 class="fw-bold">{{ $totalUser }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-file-text-fill fs-1 text-warning"></i>
                        <h6 class="mt-2">Total Pengaduan</h6>
                        <h3 class="fw-bold">{{ $totalPengaduan }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-check-circle-fill fs-1 text-success"></i>
                        <h6 class="mt-2">Pengaduan Selesai</h6>
                        <h3 class="fw-bold">{{ $pengaduanSelesai }}</h3>
                    </div>
                </div>
            </div>

        </div>

        {{-- CHART --}}
        <div class="row mt-4">

            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white fw-bold">
                        Statistik Status Pengaduan
                    </div>
                    <div class="card-body">
                        <canvas id="pengaduanChart" height="120"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white fw-bold">
                        Ringkasan
                    </div>
                    <div class="card-body">
                        <p>📄 Total Pengaduan:
                            <strong>{{ $totalPengaduan }}</strong>
                        </p>
                        <p>✅ Selesai:
                            <strong>{{ $pengaduanSelesai }}</strong>
                        </p>
                        <p>⏳ Belum Selesai:
                            <strong>{{ $totalPengaduan - $pengaduanSelesai }}</strong>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('pengaduanChart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Selesai', 'Belum Selesai'],
                datasets: [{
                    data: [
                        {{ $pengaduanSelesai }},
                        {{ $totalPengaduan - $pengaduanSelesai }}
                    ],
                    backgroundColor: ['#28a745', '#ffc107'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endpush