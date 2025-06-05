@extends('layouts.home')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <title>Edit account</title>
@endpush

@section('content')
    <h1>Edit user: {{ $user->name }}</h1>
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="">
            Edit Username
            <input type="text" class="" name="name" value="{{ $user->name }}">
        </label>
        <label for="">
            Edit Email
            <input type="email" class="" name="email" value="{{ $user->email }}">
        </label>
        <label for="">
            Edit password
            <input type="password" class="" name="password">
        </label>
        <label for="">
            Confirm password
            <input type="password" class="" name="password">
        </label>
    </form>
    {{-- return input with value user  --}}
    {{-- name --}}
    {{-- email --}}
    {{-- password --}}
    {{-- maybe request for change role --}}
    {{-- link for tg bot --}}
@endsection