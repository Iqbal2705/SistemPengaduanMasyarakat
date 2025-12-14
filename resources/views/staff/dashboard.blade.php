@extends('layouts.staff')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Dashboard Staff</h3>
            <p>Selamat datang, {{ auth()->user()->name }}</p>
        </div>
    </div>
@endsection