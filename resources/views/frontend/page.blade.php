@extends('frontend.layouts.main')
@section('content')

<div class="main-content">
    <h2>{{ $page->title }}</h2>
    <div>
        {!! Shortcode::parse($page->content) !!}
    </div>
</div>

@stop