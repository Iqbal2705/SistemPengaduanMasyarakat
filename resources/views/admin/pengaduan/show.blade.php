@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h4>📄 Detail Pengaduan</h4>
        </div>

        <div class="card-body">

            <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary mb-3">
                ← Kembali
            </a>

            <table class="table table-bordered">
                <tr>
                    <th width="200">Kode Pengaduan</th>
                    <td>{{ $pengaduan->kode_pengaduan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $pengaduan->created_at }}</td>
                </tr>
                <tr>
                    <th>Nama Pelapor</th>
                    <td>{{ $pengaduan->guest->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $pengaduan->guest->email ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $pengaduan->judul }}</td>
                </tr>
                <tr>
                    <th>Isi Laporan</th>
                    <td>{{ $pengaduan->isi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge bg-info">
                            {{ strtoupper($pengaduan->status) }}
                        </span>
                    </td>
                </tr>
            </table>

            {{-- FORM UPDATE STATUS --}}
            <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <button class="btn btn-primary">
                    💾 Update Status
                </button>
            </form>

        </div>
    </div>
@endsection