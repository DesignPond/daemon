@extends('frontend.layouts.master')
@section('content')

    <div class="layout with-right-sidebar js-layout">
        <div class="row">
            <div class="col-md-9">
                <div class="main-content">

                    <h2>{{ $page->title }}</h2>

                    <div>
                        {!! $page->content !!}
                    </div>

                </div>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs">
                <div class="sidebar js-sidebar-fixed">

                    @include('frontend.partials.search')

                    @include('frontend.partials.sidebar')

                </div>
            </div>
        </div>
    </div>

@stop