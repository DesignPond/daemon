@extends('frontend.layouts.master')
@section('content')

    <div class="row no-gutter"><!-- row -->
        <div class="col-lg-9 col-md-9 col-lg-push-3 col-md-push-3"><!-- doc body wrapper -->
            <div class="col-padded"><!-- inner custom column -->
                <div class="row gutter"><!-- row -->
                    <div class="col-lg-12 col-md-12">
                        <?php
                        $ancestor = $page->getAncestors();
                        $parent = $ancestor->last();
                        ?>
                        <h1 class="title-widget remove-margin-bottom">{{ $parent->title }}</h1>
                        <div class="news-title-meta">
                            <h1 class="page-title">{{ $page->title }}</h1>
                            <div class="news-meta">
                                <span class="news-meta-date">TERCIER / ROTEN</span>
                                <span class="news-meta-category">RRJ</span>
                                <span class="news-meta-comments"> n. 14-112</span>
                            </div>
                        </div>
                        <div class="news-body clearfix"><!-- course content -->
                            {!! $page->content !!}

                            @include('frontend.schemas.index', ['schema' => $schema])

                        </div><!-- course content end -->

                    </div>
                </div><!-- row end -->
            </div><!-- inner custom column end -->
        </div><!-- doc body wrapper end -->
        <div id="k-sidebar" class="col-lg-3 col-md-3 col-lg-pull-9 col-md-pull-9"><!-- sidebar wrapper -->
            <div class="col-padded col-shaded"><!-- inner custom column -->
                <!-- Sidebar  -->
                @include('frontend.partials.sidebar')
            </div><!-- inner custom column end -->
        </div><!-- sidebar wrapper end -->
    </div><!-- row end -->


@stop