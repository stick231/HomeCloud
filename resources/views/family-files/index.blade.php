@extends('layouts.home')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fileDash.css') }}">
    <title>Families files</title>
@endpush

@section('content')
    <h1>Files my family</h1>

    @forelse($families as $family)
        <section class="family-block">
            <h2 class="family-name">{{ $family->name }}</h2>

            @if($family->files->isEmpty())
                <p class="no-files">Нет файлов в этой семье.</p>
            @else
                <div class="files">
                    @foreach($family->files as $file)
                        <div class="file">
                            <x-file-icon :filename="$file->name" class="file-icon" />
                            <h3 class="file-name">{{ $file->name }}</h3>
                            <x-file-size :fileSize="$file->size" :checkBlock="false" />
                            <p class="file-info">Владелец файла: {{ $file->user->name }}</p>
                            <p class="file-info">Создан: {{ $file->created_at->format('Y-m-d H:i') }}</p>

                            <div class="file-actions">
                                <form action="{{ route('my-family-cloud-file.download', $file->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-download">Скачать</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    @empty
        <p>Вы не состоите ни в одной семье.</p>
    @endforelse
@endsection
