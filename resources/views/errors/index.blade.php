@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="container">
        <div class="card bg-white">
            <div class="card-header">
                {{ $errors }}
            </div>
            <div class="card-body">
                <h4>{{ $exception }}</h4>
            </div>
        </div>
    </div>

@endsection
