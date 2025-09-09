@extends('layouts.home')

@push('head')
    <title>{{ $family->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush

@section('content')
        <h1>Edit Family: {{ $family->name }}</h1>
        <form action="{{ route('my-family.update', $family->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="text" name="name" id="family-name" value="{{ $family->name }}">
            <input type="text" name='description' id="family-description" title="description" value="{{-- $family->description --}}"> 
            <input type="file" name="photo" id="family-photo">
            <input type="submit" value="Change">
        </form>
        <div class="action add-member">
            <h2>Add member</h2>
            <form action="{{ route('my-family.addMember') }}" method="post">
                    @csrf
            </form>
        </div>
@endsection