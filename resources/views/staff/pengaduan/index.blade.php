@extends('layouts.staff')

@section('content')
    <table class="table">
        @foreach($pengaduan as $p)
            <tr>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->status }}</td>
                <td><a href="/staff/pengaduan/{{ $p->id }}">Detail</a></td>
            </tr>
        @endforeach
    </table>
@endsection