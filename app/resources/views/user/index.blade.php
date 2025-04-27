@extends('layouts.home')

@push('head')
    <title>My account</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush


@section('content')
    <h1>My account</h1>
    <h2>Account Information</h2>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Created At:</strong> {{ $user->created_at }}</p>
@endsection