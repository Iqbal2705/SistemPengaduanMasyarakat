@extends('layouts.guest')

@section('title', 'Pengaduan Berhasil')

@section('content')
    <div class="alert alert-success text-center">
        <h4>Pengaduan Berhasil Dikirim</h4>
        <p>Simpan kode pengaduan berikut untuk mengecek status:</p>

        <h3 class="fw-bold">{{ $kode }}</h3>

        <a href="/cek-pengaduan" class="btn btn-primary mt-3">
            Cek Pengaduan
        </a>
    </div>
@endsection