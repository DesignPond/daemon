@extends('frontend.layouts.master')
@section('content')

<?php  $helper = new \App\Helper\Helper(); ?>

<div id="k-main-full"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->
        <div class="row gutter"><!-- row -->
            <div class="col-lg-12 col-md-12">

                <h1 class="title-widget remove-margin-bottom">
                    {{ $parent->first()->title }}
                </h1>
                <div class="news-title-meta">
                    <h1 class="page-title">{{ $page->title }}</h1>
         {{--           <div class="news-meta">
                        <span class="news-meta-date">TERCIER / ROTEN</span>
                        <span class="news-meta-category">RRJ</span>
                        <span class="news-meta-comments">n. 14-112</span>
                    </div>--}}
                </div>
                <div class="news-body clearfix"><!-- course content -->

                    @if(!$parent->isEmpty())
                        <ul>
                            <?php echo $helper->renderMenuSimple($parent->first()); ?>
                        </ul>
                    @endif

                    <div id="tree-simple" data-projet="{{ $id }}" style="width:100%; height: 40px"> </div>

                    {!! $page->content !!}

                </div><!-- course content end -->

            </div>
        </div><!-- row end -->
    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->

@stop