@extends('layouts.home')

@push('head')
    <title>{{ $family->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush

@section('content')
    {{-- <div class="container"> --}}
        <h1>{{ $family->name }}</h1>
        <form action="{{ route('my-family.update', $family->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="text" name="name" id="family-name" value="{{ $family->name }}">
            <input type="text" name='description' id="family-description" value="{{-- $family->description --}}"> 
            <input type="file" name="photo" id="family-photo">
            @foreach ($family->users as $user)
                <label for="">
                    <input type="checkbox" name="member[]" value="{{ $user->id }}">{{-- добавить пользователей только тех кого нет --}}
                    {{ $user->name }}
                </label>
            @endforeach
                <button>test</button>
        </form>
    {{-- </div> --}}
@endsection