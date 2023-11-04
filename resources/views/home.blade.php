@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="card bg-white">
            <div class="card-body">
                <h4>Selamat datang {{ Auth::user()->name }}</h4>
            </div>
        </div>
    </div>

@endsection
