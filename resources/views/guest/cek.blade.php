@extends('layouts.guest')

@section('title', 'Cek Pengaduan')

@section('content')
    <h3>Status Pengaduan Anda</h3>

    @if(isset($message))
        <div class="alert alert-warning">
            {{ $message }}
        </div>
    @endif

    @if(isset($pengaduan))
        <div class="card mb-3">
            <div class="card-body text-center">
                <h5>Status</h5>
                <span class="badge bg-{{ $pengaduan->status_badge }} p-2">
                    {{ $pengaduan->status_label }}
                </span>

                @if($pengaduan->foto)
                    <div class="mt-3">
                        <h6>📷 Foto Laporan</h6>
                        <img src="{{ asset('storage/' . $pengaduan->foto) }}"
                             class="img-fluid rounded"
                             style="max-height:300px">
                    </div>
                @endif

                <hr>

                <h5>💬 Balasan Staff</h5>

                @forelse($pengaduan->balasan as $balasan)
                    <div class="border rounded p-2 mb-2 text-start">
                        <strong>{{ $balasan->user->name ?? 'Staff' }}</strong>
                        <p class="mb-0">{{ $balasan->pesan }}</p>
                    </div>
                @empty
                    <p class="text-muted">Belum ada balasan.</p>
                @endforelse
            </div>
        </div>
    @endif
@endsection
