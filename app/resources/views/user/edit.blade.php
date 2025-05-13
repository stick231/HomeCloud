@extends('layouts.home')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <title>Edit account</title>
@endpush

@section('content')
    {{-- return input with value user  --}}
    {{-- name --}}
    {{-- email --}}
    {{-- password --}}
    {{-- maybe request for change role --}}
    {{-- link for tg bot --}}
@endsection