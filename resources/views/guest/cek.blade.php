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
                <span class="badge bg-primary p-2">
                    {{ ucfirst($pengaduan->status) }}
                </span>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>💬 Balasan Staff</h5>

                @forelse($pengaduan->balasan as $balasan)
                    <div class="border rounded p-2 mb-2">
                        <strong>{{ $balasan->user->name ?? 'Staff' }}</strong>
                        <p class="mb-0">{{ $balasan->pesan }}</p>
                    </div>
                @empty
                    <p class="text-muted">Belum ada balasan dari staff.</p>
                @endforelse
            </div>
        </div>
    @endif
@endsection