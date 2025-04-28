@extends('layouts.home')


@push('head')
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush


@section('content')
    <h1>Main</h1>
    <section class="files">
        @foreach($files as $file)
            <div class="file">
                <h2>{{ $file->name }}</h2>
                <p>Размер: {{ $file->size }} байт</p>
                <p>Дата создания: {{ $file->created_at }}</p>
                <p>Дата изменения: {{ $file->updated_at }}</p>
                {{-- <form action="{{ route('file.download', $file->id) }}" method="POST">
                    @csrf
                    <button type="submit">Скачать</button>
                </form> --}}
                <form action="{{ route('destroy', $file->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
        @if($files->isEmpty())
            <p>Нет файлов для отображения.</p>
        @endif
    </section>
    {{-- Загрузка папки --}}
    <a href="{{route('create')}}">Перенести файл</a>
@endsection