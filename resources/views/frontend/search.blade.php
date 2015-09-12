@extends('frontend.layouts.master')
@section('content')

<div id="k-sidebar">
    <!-- Sidebar  -->
    @include('frontend.partials.sidebar')
</div><!-- sidebar wrapper end -->

<div id="k-main"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->
        <div class="row gutter"><!-- row -->
            <div class="col-lg-12 col-md-12">

                <div class="col-lg-12 col-md-12">
                    <h1 class="title-widget remove-margin-bottom">Résultats pour <em>{{ $term }}</em></h1>
                </div>

                @if($results)
                    @foreach($results as $result)

                        <div class="k-article-summary col-lg-12 col-md-12">
                            <div class="news-title-meta">
                                <h1 class="page-title"><a href="{{ url('schemas/'.$result->id) }}" title="{{ $result->title }}">{{ $result->title }}</a></h1>
                            </div>
                            <div class="news-body">
                                <p>
                                    <?php $value = str_limit($result->content, 350); ?>
                                    {!! $value !!}
                                    <p><a href="{{ url('schemas/'.$result->id) }}" class="moretag">Voir plus</a></p>
                                </p>
                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="k-article-summary col-lg-12 col-md-12">
                        <div class="news-body">
                            <p>Pas de résultats</p>
                        </div>
                    </div>
                @endif

            </div>
        </div><!-- row end -->
    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->

@stop