@extends('layouts.admin')

@section('title', 'Data Guest')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h3>👥 Data Masyarakat (Guest)</h3>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guests as $i => $guest)
                <tr>
                    <td>{{ $guests->firstItem() + $i }}</td>
                    <td>{{ $guest->nama }}</td>
                    <td>{{ $guest->email }}</td>
                    <td>{{ $guest->no_hp }}</td>
                    <td>
                        <a href="{{ route('admin.guest.show', $guest->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.guest.edit', $guest->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.guest.destroy', $guest->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $guests->links() }}
    </div>
</div>
@endsection
