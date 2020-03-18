@extends('site.layout.index')
@section('content')
    <main class="py-4 ltr-styl">
        <div class="footerLink">
            <div class="container">
                <h2>{!! $item->title !!}</h2>
                <p>{!! $item->body !!}</p>
            </div>
        </div>
    </main>
@stop
