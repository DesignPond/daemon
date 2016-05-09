@extends('frontend.layouts.master')
@section('content')

    <p><a href="{{ url('ticket') }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-left"></i> &nbsp;Retour</a></p>
    <h2>Ticket</h2>
    <hr/>
    <div class="panel">
           <header class="panel-header">{{ $ticket->subject }}</header>
           <section class="panel-content">
                <ul class="label-list">
                   <li class="label-item">Priorité <span class="label" style="background: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span></li>
                   <li class="label-item">Statut <span class="label" style="background: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span></li>
                   <li class="label-item">Catégorie <span class="label" style="background: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span></li>
                </ul>
                <hr/>
                <div class="helper mb30">{!! $ticket->content !!}</div>
           </section>
    </div>

@stop