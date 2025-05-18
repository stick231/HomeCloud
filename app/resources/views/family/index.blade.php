@extends('layouts.home')

@push('head')
    <title>My Family</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/familyDash.css') }}">
@endpush


@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>My Family</h1>
    @if($families ->isEmpty())
        <p>Семей нет</p>
    @else
        <div class="families-container">
        @foreach($families as $family)
            <div class="family-dashboard">
                <div class="family-header">
                    <div class="family-name">Family name: {{ $family->name }}</div>
                </div>
                <div class="family-info">
                    <div class="members">
                        <div>Members: {{ $family->users->count() }}</div>
                    </div>
                </div>
                <div class="family-info">
                    <div class="files">
                        <div>Count family files:    </div>
                    </div>
                </div>
                <div class="family-info">
                    <div class="family-user-info">
                       <div>Your role in family: {{ $family->users()->where('users.id', $user->id)->first()->role ?? 'Unknown' }}</div>
                    </div>
                </div>
                <div class="recent-files">
                    <h3>Недавние файлы:</h3>
                    <p></p>
                    <p></p>
                </div>
                <div class="action-form">
                    <h3>Action</h3>
                    <form action="{{ route('my-family.edit', $family->id) }}" method="get">
                    <button class="family-action">Edit</button>
                </form>
                <a class='family-action' href="{{ route('my-family.show', $family->id) }}">Show</a>
                </div>
            </div>
        @endforeach
        </div>
        
    @endif
    @can('admin-only')
        <a href="{{ route('my-family.create') }}" class="family-action create">Add Family</a>
    @endcan

@endsection