@extends('layouts.home')

@push('head')
    <title>{{ $family->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editFamily.css') }}">
@endpush

@section('content')
        <h1>Edit Family: {{ $family->name }}</h1>
        <form action="{{ route('my-family.update', $family->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="text" name="name" id="family-name" value="{{ $family->name }}">
            <input type="text" name='description' id="family-description" title="description" value="{{ $family->description }}"> 
            <input type="file" name="photo" id="family-photo">
            <input type="submit" value="Change">
        </form>
        <div class="action add-member">
            <h2>Add member</h2>
            <form action="{{ route('my-family.addMember', $family->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    @foreach ($users as $user)
                    <input type="checkbox" 
                           name="user_ids[]" 
                           value="{{ $user->id }}" 
                           id="user-{{ $user->id }}"
                           class="form-check-input"
                           {{ in_array($user->id, $familyMembersIds) ? 'checked' : '' }}>
                    <label for="user-{{ $user->id }}" class="form-check-label">
                        {{ $user->name }} ({{ $user->email }})
                    </label>
                    @endforeach
                <button type="submit">Ok</button>
            </form>
        </div>
@endsection