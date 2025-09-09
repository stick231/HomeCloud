@extends('layouts.home')

@push('head')
    <title>
        {{ $user->id === $profileUser->id ? 'My Account' : $profileUser->name . '\'s Profile' }}
    </title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush

@section('content')
    @if($user->id === $profileUser->id)
        <h1>My Account</h1>

        <div class="account-info">
            <h2>Account Information</h2>
            <p><strong>Name:</strong> <span>{{ $user->name }}</span></p>
            <p><strong>Email:</strong> <span>{{ $user->email }}</span></p>
            <p><strong>Your role:</strong> <span>{{ $user->role }}</span></p>
            <p><strong>Your max storage size: </strong> 
                <x-file-size :fileSize="$user->max_storage_size" :checkBlock="true" />
            </p>
            <p><strong>Telegram ID:</strong> 
                <span>
                    {{ $user->is_telegram_user ? $user->telegram_id : 'Not linked' }}
                </span>
            </p>
            <p><strong>Created At:</strong> <span>{{ $user->created_at }}</span></p>
        </div>

        <form action="{{ route('user.edit', $user->id) }}" method="get">
            <button type="submit">Edit Profile</button>
        </form>
    @else
        <h1>{{ $profileUser->name }}'s Public Profile</h1>
        <div class="public-profile">
            <p><strong>Joined:</strong> {{ $profileUser->created_at->format('F j, Y') }}</p>
        </div>
        {{-- create description --}}
    @endif
@endsection
