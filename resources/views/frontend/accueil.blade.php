@extends('frontend.layouts.master')
@section('content')

<!-- End of Header Back -->
<div class="panels" id="content">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>HOME</h2>
                <hr/>

                <h4>Documentation du site internet <strong>{!! Registry::get('nom', 'DesignPond') !!}</strong></h4>
                <div>{!! $page->content !!}</div>

                <div class="panel">
                    <header class="panel-header"> Administration Droit Formation </header>
                    <section class="panel-content">
                        <p class="helper mb30">Ce site décrit les divers fonctionnalités de l'administration ainsi que les divers pages des sites.</p>
                        <div class="helper center">
                            <div class="button-list">
                                <a class="button green" href="{{ url('page') }}">Voir</a>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

    </div>
</div>

@stop