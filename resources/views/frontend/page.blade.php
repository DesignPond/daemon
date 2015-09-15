@extends('frontend.layouts.master')
@section('content')

<div id="k-sidebar">
    <!-- Sidebar  -->
    @include('frontend.partials.sidebar')
</div><!-- sidebar wrapper end -->

<div id="k-main"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->
        <div class="row"><!-- row -->
            <div class="col-lg-12 col-md-12">
                <?php
                    $ancestor = $page->getAncestors();
                    $parent   = $ancestor->last();
                ?>
                <h1 id="changPoint" class="title-widget remove-margin-bottom">{{ $parent->title }}</h1>
                <div class="news-title-meta">
                    <h1 class="page-title">{{ $page->title }}</h1>
                    <div class="news-meta">
                        <span class="news-meta-date">TERCIER / ROTEN</span>
                        <span class="news-meta-category">RRJ</span>
                        <span class="news-meta-comments"> n. 14-112</span>
                    </div>
                </div>
                <div class="news-body clearfix"><!-- course content -->

                    <div class="row">
                        <div class="col-md-2">
                            @include('frontend.projet.menu')
                        </div>
                        <div class="col-md-10">
                            @include('frontend.projet.content')
                        </div>
                    </div>
                    
                </div><!-- course content end -->

            </div>
        </div><!-- row end -->
    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->

@stop