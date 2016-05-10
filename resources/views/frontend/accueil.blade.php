@extends('frontend.layouts.master')
@section('content')

<h2>ACCUEIL</h2><hr/>

<h3>Site de documentations des sites de <strong>{!! Registry::get('nom', 'DesignPond') !!}</strong></h3>

@if(!$sites->isEmpty())
    @foreach($sites as $site)
        <div class="panel">
            <header class="panel-header"> {{ $site->nom  }} </header>
            <section class="panel-content">
                <p class="helper mb30">{!! $site->description !!}</p>
                <div class="helper">
                    <div class="button-list">
                        <a class="button green" href="{{ url('page/'.$site->root->slug) }}">Voir</a>
                    </div>
                </div>
            </section>
        </div>
    @endforeach
@endif

<div class="panel">
    <header class="panel-header" style="margin-bottom: 0;">
        Un soucis? Un bug? Besoin d'une nouvelle fontionnalité? <a class="btn btn-warning btn-lg pull-right" href="{{ url('ticket') }}">Créer un ticket</a>
    </header>
</div>

@stop