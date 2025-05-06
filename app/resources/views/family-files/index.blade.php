@extends('layouts.home')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fileDash.css') }}">
    <title>Families files</title>
@endpush

@section('content')
    <h1>Files my family</h1>
    <section class="files">
        @foreach($familyFiles as $file)
            <div class="file">
                <x-file-icon :filename="$file->name" class="file-icon" />
                <h2 class="file-name">{{ $file->name }}</h2>
                <p class="file-info">Размер: {{ number_format($file->size / 1024, 2) }} КБ</p>
                <p class="file-info">Владелец файла: {{ $file->user->name }}</p>
                <p class="file-info">Создан: {{ $file->created_at->format('Y-m-d H:i') }}</p>
                <p class="file-info">Изменён: {{ $file->updated_at->format('Y-m-d H:i') }}</p>
    
                <div class="file-actions">
                    <form action="{{ route('my-family-cloud-file.download', $file->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-download">Скачать</button>
                    </form>
                </div>
            </div>
        @endforeach
    
        @if($familyFiles->isEmpty())
            <p class="no-files">Нет файлов для отображения.</p>
        @endif
    </section>
@endsection