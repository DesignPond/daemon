@extends('frontend.layouts.main')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="main-content">
            <h2>{{ $page->title }}</h2>
            <div>
                {!! Shortcode::parse($page->content) !!}
            </div>
        </div>
    </div>
</div>

@stop