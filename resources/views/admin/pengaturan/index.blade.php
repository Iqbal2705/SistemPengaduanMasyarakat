@extends('layouts.admin')
@section('content')
    <h3>Pengaturan Sistem</h3>

    <form method="POST" action="{{ route('admin.pengaturan.update') }}">
        @csrf
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection