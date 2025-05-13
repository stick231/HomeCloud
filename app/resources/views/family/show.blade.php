@extends('layouts.home')

@push('head')
    <title>{{ $family->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush

@section('content')
    <div class="container">
    {{-- return accounts member  --}}
    {{-- create accounts page user --}}
@endsection