@extends('layouts.admin')

@section('title', 'Manajemen Staff')

@section('content')
<div class="card">
    <div class="card-header" style="background: #007bff; color: white; padding: 15px; border-radius: 8px 8px 0 0; display: flex; justify-content: space-between; align-items: center;">
        <h3 style="margin: 0;">Manajemen Staff</h3>

        <a href="{{ route('admin.staff.create') }}" class="btn btn-primary" style="background: white; color: #007bff;">
            ➕ Tambah Staff
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($staff->count() > 0)

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                            <th>No</th>
                            <th>Kode Staff</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>No. HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staff as $index => $item)
                        <tr>
                            <td>{{ $staff->firstItem() + $index }}</td>
                            <td><strong>{{ $item->kode_staff }}</strong></td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->no_hp ?? '-' }}</td>
                            <td>
                                @if($item->status == 'aktif')
                                    <span style="color: green;">Aktif</span>
                                @else
                                    <span style="color: red;">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.staff.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                <form action="{{ route('admin.staff.destroy', $item->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $staff->links() }}
            </div>

        @else
            <p class="text-center text-muted mt-4">
                Belum ada data staff
            </p>
        @endif

    </div>
</div>
@endsection
