@extends('layouts.admin')
@section('content')
    <h3>Laporan</h3>

    <ul class="list-group">
        <li class="list-group-item">Total: {{ $total }}</li>
        <li class="list-group-item">Pending: {{ $pending }}</li>
        <li class="list-group-item">Proses: {{ $proses }}</li>
        <li class="list-group-item">Selesai: {{ $selesai }}</li>
    </ul>
@endsection