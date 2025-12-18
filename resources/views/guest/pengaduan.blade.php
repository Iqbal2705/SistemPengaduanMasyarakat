@extends('layouts.guest')

@section('title', 'Buat Pengaduan')

@section('content')
    <h3 class="mb-4">Form Pengaduan Masyarakat</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/pengaduan" method="POST" enctype="multipart/form-data">
        @csrf

        <h5>Data Pelapor</h5>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <hr>

        <h5>Detail Pengaduan</h5>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Laporan</label>
            <textarea name="isi_laporan" rows="5" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto (Opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>

        <button class="btn btn-success">Kirim Pengaduan</button>
    </form>
@endsection