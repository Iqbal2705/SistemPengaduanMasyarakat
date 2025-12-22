@extends('layouts.admin')

@section('title', 'Detail Guest')

@section('content')
    <a href="{{ route('admin.guest.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card">
        <div class="card-body">
            <h4>👤 {{ $guest->nama }}</h4>
            <p>Email: {{ $guest->email }}</p>
            <p>No HP: {{ $guest->no_hp }}</p>
            <p>Alamat: {{ $guest->alamat ?? '-' }}</p>

            <hr>
            <h5>📄 Pengaduan</h5>

            @forelse($guest->pengaduan as $p)
                <div class="border p-2 mb-2">
                    <strong>{{ $p->judul }}</strong>
                    <p>Status: {{ $p->status }}</p>
                </div>
            @empty
                <p class="text-muted">Belum ada pengaduan</p>
            @endforelse
        </div>
    </div>
@endsection