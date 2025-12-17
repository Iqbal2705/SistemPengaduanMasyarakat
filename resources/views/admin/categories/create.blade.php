@extends('layouts.admin')
@section('content')
    <h2>Tambah Kategori</h2>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <input name="name" placeholder="Nama kategori">
        <button>Simpan</button>
    </form>
@endsection