@extends('layouts.app')


@push('head')
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="{{ asset('css/homecloud.css') }}">
@endpush


@section('content')
    <h1>Main</h1>
    <section class="files">
        <div class="file-card">This is be file</div>
        <div class="file-card">And this</div>
    </section>
@endsection