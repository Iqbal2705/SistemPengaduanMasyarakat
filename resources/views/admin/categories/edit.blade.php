@extends('layouts.admin')
@section('content')
    <h2>Edit Kategori</h2>
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf @method('PUT')
        <input name="name" value="{{ $category->name }}">
        <button>Update</button>
    </form>
@endsection