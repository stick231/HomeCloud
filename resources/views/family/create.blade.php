@extends('layouts.home')

@push('head')
    <title>Create Family</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush


@section('content')
    <h1>Creating Family</h1>
    <form action="{{ route('my-family.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Family Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <input type="text" name="description" id="description" class="form-control" placeholder="Description (optional)">
            <input type="file" name="photo" id="family-photo">
            {{-- input file photo in future --}}
        </div>
        <button type="submit" class="btn btn-primary">Create Family</button>
        <a href="{{ route('my-family.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection      