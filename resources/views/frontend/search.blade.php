@extends('frontend.layouts.master')
@section('content')

    <div class="layout with-right-sidebar js-layout">
        <div class="row">
            <div class="col-md-9">
                <div class="main-content">

                    <h2>Résultats</h2>
                    <hr/>

                    <h4>Recherche: {{ $term }}</h4>

                    @if(!$results->isEmpty())
                        @foreach($results as $result)
                            <div class="panel panel-small">
                                <header class="panel-header">{{ $result->title }} </header>
                                <section class="panel-content">
                                    <p>{!! $result->limit_text !!}</p>
                                    <p><a href="{{ url('page/'.$result->slug) }}" class="button small blue">Voir</a></p>
                                </section>
                            </div>
                        @endforeach
                    @endif

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