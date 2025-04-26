@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1 class="display-1">401</h1>
        <h4 class="mb-4">Oops! Kamu tidak punya akses ke halaman ini.</h4>
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
@endsection
