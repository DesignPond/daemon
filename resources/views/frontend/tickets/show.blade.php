@extends('frontend.layouts.master')
@section('content')

    <h2>Ticket</h2><hr/>

    <div class="panel">
           <header class="panel-header">{{ $ticket->subject }}</header>
           <section class="panel-content">
                <ul class="label-list">
                   <li class="label-item">
                       <a href="#">Priorité: <span class="label" style="background: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span></a>
                   </li>
                   <li class="label-item">
                       <a href="#">Statut: <span class="label" style="background: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span></a>
                   </li>
                   <li class="label-item">
                       <a href="#">Catégorie: <span class="label" style="background: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span></a>
                   </li>
                </ul>
                <hr/>
                <div class="helper mb30">{!! $ticket->content !!}</div>
           </section>
    </div>

@stop