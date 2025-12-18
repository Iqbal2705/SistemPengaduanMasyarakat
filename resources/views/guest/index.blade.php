@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')
    <div class="text-center">
        <h1 class="mb-3">Sistem Pengaduan Masyarakat</h1>
        <p class="lead">
            Sampaikan laporan atau pengaduan Anda secara online dengan mudah dan aman.
        </p>

        <a href="/pengaduan" class="btn btn-primary btn-lg mt-3">
            Buat Pengaduan
        </a>

        <a href="/cek" class="btn btn-primary btn-lg mt-3">
            Cek Pengaduan
        </a>
    </div>
@endsection