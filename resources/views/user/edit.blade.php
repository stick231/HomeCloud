@extends('layouts.home')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/editUser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <title>Edit account</title>
@endpush

@section('content')
    <h1>Edit user: {{ $user->name }}</h1>
    <form action="{{ route('user.update', $user->id) }}" class="user-edit" method="post">
        @csrf
        @method('PUT')
        <label>
            Edit Username
            <input type="text" name="name" value="{{ $user->name }}">
        </label>
        <label>
            Edit Email
            <input type="email" name="email" value="{{ $user->email }}">
        </label>
        <!-- Добавьте это поле -->
        <label>
            Current Password
            <input type="password" name="current_password">
        </label>
        <label>
            New Password
            <input type="password" name="password">
        </label>
        <label>
            Confirm New Password
            <input type="password" name="password_confirmation">
        </label>
        <input type="submit" value="Confirm">
    </form>
    @if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- return input with value user  --}}
    {{-- name --}}
    {{-- email --}}
    {{-- password --}}
    {{-- maybe request for change role --}}
    {{-- link for tg bot --}}
@endsection