@extends('layouts.home')

@push('head')
    <title>Create Family</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush


@section('content')
    <h1>Creating Family</h1>
    <form action="{{ route('family.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Family Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Family</button>
        <a href="{{ route('family.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection      