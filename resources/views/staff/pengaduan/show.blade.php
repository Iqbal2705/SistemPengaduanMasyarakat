@extends('layouts.staff')

@section('content')
    <h4>{{ $pengaduan->judul }}</h4>
    <p>{{ $pengaduan->isi }}</p>

    @foreach($pengaduan->balasan as $b)
        <p><b>{{ $b->user->name }}</b>: {{ $b->pesan }}</p>
    @endforeach

    <form method="POST">
        @csrf
        <textarea name="pesan"></textarea>
        <button>Kirim</button>
    </form>
@endsection