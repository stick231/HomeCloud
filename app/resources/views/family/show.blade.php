@extends('layouts.home')

@push('head')
    <title>{{ $family->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush

@section('content')
    <div class="container">
        <h1>{{ $family->name }}</h1>
        
    </div>
@endsection