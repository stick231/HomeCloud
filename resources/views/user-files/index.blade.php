@extends('layouts.home')


@push('head')
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fileDash.css') }}">
@endpush


@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>My files</h1>
    <section class="files">
        @foreach($files as $file)
            <div class="file">
                <x-file-icon :filename="$file->name" class="file-icon" />
                <h2 class="file-name">{{ $file->name }}</h2>
                <x-file-size :fileSize="$file->size" :checkBlock="false" />
                <p class="file-info">Создан: {{ $file->created_at->format('Y-m-d H:i') }}</p>
                <p class="file-info">Изменён: {{ $file->updated_at->format('Y-m-d H:i') }}</p>{{-- fix or delete --}}
    
                <div class="file-actions">
                    <form action="{{ route('my-cloud-file.download', $file->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-download">Скачать</button>
                    </form>
                    <form action="{{ route('my-cloud.destroy', $file->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    
        @if($files->isEmpty())
            <p class="no-files">Нет файлов для отображения.</p>
        @endif
    </section>

    {{-- сделать загрузку папки --}}
    <a id='button-create-file' href="{{route('my-cloud.create')}}">Перенести файл</a>
@endsection