@extends('layouts.home')

@push('head')
    <title>My account</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush

@section('content')
    <h1>My account</h1>
    <div class="account-info">
        <h2>Account Information</h2>
        <p><strong>Name:</strong> <span>{{ $user->name }}</span></p>
        <p><strong>Email:</strong> <span>{{ $user->email }}</span></p>
        <p><strong>Your role:</strong> <span>{{ $user->role }}</span></p>
        <p><strong>Your max storage size: </strong> <x-file-size :fileSize='$user->max_storage_size' :checkBlock="true"/></p>
        @if($user->is_telegram_user === true)
            <p><strong>Telegram ID:</strong> <span>{{ $user->telegram_id }}</span></p>
        @else
            <p><strong>Telegram ID:</strong> <span>Not linked</span></p>
        @endif
        <p><strong>Created At:</strong> <span>{{ $user->created_at }}</span></p>
    </div>
    <form action="{{ route('user.edit', $user->id) }}" method="get">
        <button type="submit">Edit Profile</button>
    </form>
    {{-- maybe return route user/{$name} with restriction @can('') for button edit and statistic --}}
    
@endsection