@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Tambah Staff</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('staff.store') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-2">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control">
                </div>

                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection