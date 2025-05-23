@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Selamat datang, {{ Auth::user()->nama }}</h3>
        <p>Anda login sebagai <strong>{{ Auth::user()->role }}</strong></p>
    </div>
@endsection
