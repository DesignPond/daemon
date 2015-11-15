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

                    <!-- Article Navigation -->
                    <div class="article-navigation">
                        <a href="" class="article-navigation-prev">Older Post</a>
                        <a href="" class="article-navigation-next">Newer Post</a>
                    </div>
                    <!-- End of Article Navigation -->

                    <!-- Article Widget Related Article -->
                    <div class="article-widget">
                        <h3 class="article-widget-title"> Related tutorials </h3>
                        <ul class="article-related-articles">
                            <li><a href="#">Perspiciatis illo facere alias laboriosam totam repellendus quisquam, maiores tenetur aut.</a></li>
                            <li><a href="#">Temporibus quisquam, aliquam id totam voluptas eaque inventore ut facilis minus.</a></li>
                        </ul>
                    </div>
                    <!-- End of Article Widget Related Article -->

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