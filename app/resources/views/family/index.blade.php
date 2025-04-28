@extends('layouts.home')

@push('head')
    <title>My Family</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush


@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>My Family</h1>
    @can('create-family')
        <a href="{{ route('family.create') }}" class="btn btn-primary">Добавить семью</a>
    @endcan
    @if($families ->isEmpty())
        <p>Семей нет</p>
    @else
        @foreach($families as $family)
            <div class="family-card">
                <h2>{{ $family->name }}</h2>
                <p>Дата создания: {{ $family->created_at }}</p>
                <p>Дата обновления: {{ $family->updated_at }}</p>
                @can('update-family', $family)
                    <a href="{{ route('family.edit', $family) }}" class="btn btn-secondary">Редактировать</a>
                @endcan
                @can('delete-family', $family)
                    <form action="{{ route('family.destroy', $family) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                @endcan
                <a href="{{ route('family.show', $family) }}" class="btn btn-info">Просмотреть</a>
                @can('add-family-member')
                <form action="{{ route('family.addMember') }}" method="POST" >
                    @csrf
                    <input type="hidden" name="family_id" value="{{ $family->id }}">
                    <label for="user_id">Добавить участника:</label>
                    <select name="user_id" id="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <label for="role">Роль:</label>
                    <select name="role" id="role">
                        <option value="user">User</option>
                        <option value="sub-admin">Sub-admin</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button type="submit" class="btn btn-success">Добавить</button>
                </form>
                @endcan
            </div>
        @endforeach
    @endif

@endsection      