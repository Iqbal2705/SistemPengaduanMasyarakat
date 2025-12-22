@extends('layouts.admin')
@section('content')
    <h3>Data Pengaduan</h3>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($pengaduan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->kode_pengaduan }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <a href="{{ route('admin.pengaduan.show', $p->id) }}" class="btn btn-sm btn-primary">Detail</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection