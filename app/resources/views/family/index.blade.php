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
    @can('admin-only')
        <a href="{{ route('my-family.create') }}" class="btn btn-primary">Добавить семью</a>
    @endcan
    @if($families ->isEmpty())
        <p>Семей нет</p>
    @else
        @foreach($families as $family)
            <div class="family-dashboard">
                <div class="family-header">
                    <div class="family-name">Family name: {{ $family->name }}</div>
                </div>
                <div class="family-info">
                    <div class="members">
                        <div>Members: {{ $family->users->count() }}</div>
                    </div>
                    <div class="files">
                        {{-- <div>Files: {{ $family->files->count() }}</div> вывод колво файлов семьи--}}
                    </div>
                </div>
                <div>
                </div>
                <div class="recent-files">
                    <h3>Недавние файлы:</h3>
                    <p></p>
                    <p></p>
                </div>
                <a href="{{ route('my-family.show', $family->id) }}">Manage</a> 
            </div>
        @endforeach
    @endif

@endsection