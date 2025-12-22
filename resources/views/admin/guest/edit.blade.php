@extends('layouts.admin')

@section('title', 'Edit Guest')

@section('content')
    <a href="{{ route('admin.guest.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.guest.update', $guest->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input name="nama" value="{{ $guest->nama }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input name="email" value="{{ $guest->email }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input name="no_hp" value="{{ $guest->no_hp }}" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection