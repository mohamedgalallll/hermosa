
@extends('site.layout.index')
@section('page_js')
    <script src="{{ asset('js/app.js') }}" defer></script>
@stop
@section('page_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
    <main class="" id="app">
        <div class="container">
            <chat :user=" {{ $user }}"></chat>
        </div>
    </main>
@stop
