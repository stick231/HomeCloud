@extends('layouts.home')


@push('head')
    <title>Загрузка файла</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addFile.css') }}">
@endpush

@section('content')
<h1>Загрузка файла</h1>
<form class='file-form' action="{{ route('my-cloud.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Выберите файл для загрузки:</label>
        <input type="file" name="file" id="file" class="form-control" required>
    </div>
    <div class="form-group mt-3">
        <label for="visibility">Кто может видеть файл:</label>
        <select name="visibility" id="visibility" class="form-control" required>
            <option value="public">Public</option>
            <option value="family">Family</option>
            <option value="private">Private</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Загрузить</button>
</form>
    </div>
@endsection