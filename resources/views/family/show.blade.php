@extends('layouts.home')

@push('head')
    <title>{{ $family->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/showFamily.css') }}">
@endpush

@section('content')
    <h1>Family: {{ $family->name }}</h1>

    <div class="bl-family-member">
        <h2>Family Members</h2>
        <div class="family-member">
            @foreach ($family->users as $user)
                <div class="member-card">
                    <a href="{{ route('user.index', $user->name) }}">
                        @if($user->avatar)
                            <img src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->name }}" class="member-avatar">
                        @else
                            <div class="member-avatar placeholder">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        @endif
                        <div class="member-info">
                            <span class="member-name">{{ $user->name }}</span>
                            <span class="member-role">Role: {{ $family->users()->where('users.id', $user->id)->first()->role ?? 'Unknown' }}</span>
                            <span class="member-email">{{ $user->email }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
