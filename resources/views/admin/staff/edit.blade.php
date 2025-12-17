@extends('layouts.admin')

@section('title', 'Edit Staff')

@section('content')
<div class="card">
    <div class="card-header" style="background: #007bff; color: white; padding: 15px; border-radius: 8px 8px 0 0;">
        <h3 style="margin: 0;">Edit Staff</h3>
    </div>

    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Kode Staff</label>
                <input type="text" class="form-control" value="{{ $staff->kode_staff }}" disabled>
            </div>

            <div class="form-group">
                <label>Nama <span style="color: red;">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $staff->user->name) }}" required>
            </div>

            <div class="form-group">
                <label>Email <span style="color: red;">*</span></label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $staff->user->email) }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <small style="color: #666;">Kosongkan jika tidak ingin mengubah password</small>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <label>Jabatan <span style="color: red;">*</span></label>
                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $staff->jabatan) }}" required>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $staff->no_hp) }}">
            </div>

            <div class="form-group">
                <label>Status <span style="color: red;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="aktif" {{ old('status', $staff->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $staff->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">
                    <span style="margin-right: 5px;">💾</span> Update Staff
                </button>
                <a href="{{ route('admin.staff.index') }}" class="btn" style="background: #6c757d; color: white;">
                    <span style="margin-right: 5px;">←</span> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
</style>
@endsection