@extends('frontend.layouts.master')
@section('content')

<!-- End of Header Back -->
<div class="panels" id="content">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>ACCUEIL</h2>
                <hr/>

                <h4>Documentations des sites de <strong>{!! Registry::get('nom', 'DesignPond') !!}</strong></h4>
                <div>{!! $page->content !!}</div>

                @if(!$sites->isEmpty())
                    @foreach($sites as $site)
                        <div class="panel">
                            <header class="panel-header"> {{ $site->nom  }} </header>
                            <section class="panel-content">
                                <p class="helper mb30">{!! $site->description !!}</p>
                                <div class="helper center">
                                    <div class="button-list">
                                        <a class="button green" href="{{ url('page/'.$site->root->slug) }}">Voir</a>
                                    </div>
                                </div>
                            </section>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

    </div>
</div>

@stop