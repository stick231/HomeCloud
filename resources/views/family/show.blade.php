@extends('layouts.home')

@push('head')
    <title>{{ $family->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush

@section('content')
    <h1>Family: {{ $family->name }}</h1>
    <div class="bl-family-member">
        <h2>Family member</h2>
        <div class="family-member">
        @foreach ($family->users as $user)
            
            <div>Username: {{ $user->name }}</div>
            <div>Role in family: </div>
        @endforeach
        </div>
    </div>
    {{-- return accounts member  --}}
    {{-- create accounts page user --}}
@endsection