@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Data Staff</h3>
            <a href="{{ route('staff.create') }}" class="btn btn-primary btn-sm">
                + Tambah Staff
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->user->name }}</td>
                            <td>{{ $s->user->email }}</td>
                            <td>{{ $s->jabatan }}</td>
                            <td>
                                <a href="{{ route('staff.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('staff.destroy', $s->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection