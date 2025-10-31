@extends('layouts.home')

@push('head')
    <title>Загрузка файлов</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addFile.css') }}">
@endpush

@section('content')
<h1>Загрузка файлов и папок</h1>

<form id="upload-form" class="file-form" action="{{ route('my-cloud.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Кастомная drag & drop зона --}}
    <div id="drop-area" style="border:2px dashed #007bff; padding:20px; text-align:center;">
        <p>Перетащите файлы сюда или нажмите кнопку</p>
        <button id="browse-btn" type="button">Выбрать файлы</button>
        <input type="file" id="file-input" multiple hidden>
        <ul id="file-list"></ul>
    </div>

    {{-- Privacy --}}
    <div class="form-group mt-3">
        <label for="visibility">Кто может видеть файл:</label>
        <select name="visibility" id="visibility" class="form-control" required>
            <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private</option>
            <option value="family" {{ old('visibility') == 'family' ? 'selected' : '' }}>Family</option>
        </select>
    </div>

    {{-- Family --}}
    <div id="family-container" class="form-group mt-3"> {{--  create dynamic opens in TS --}}
        <label>Выберите семьи:</label><br>
        @foreach($families as $family)
            <div class="form-check">
                <input type="checkbox" name="families[]" value="{{ $family->id }}" id="family_{{ $family->id }}" class="form-check-input">
                <label class="form-check-label" for="family_{{ $family->id }}">{{ $family->name }}</label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary mt-4">Загрузить</button>
</form>

@vite('resources/ts/pages/upload_file.ts')
@endsection
