@extends('frontend.layouts.master')
@section('content')

    <h2>Envoyer un ticket au support</h2>

    <div class="panel">
        <a href="{{ url('ticket') }}" class="btn btn-sm btn-primary">En cours <span class="badge">{{ $tickets->count() }}</span></a>
        <a href="{{ url('ticket/complete') }}" class="btn btn-sm btn-default">Résolus <span class="badge">{{ $complete->count() }}</span></a>
        <a href="{{ url('ticket/create') }}" class="btn btn-sm btn-info pull-right">Créer un ticket</a>
        <hr/>
        <h3>Tickets en cours</h3>
        <table class="table table-striped">
            <tr>
                <th class="col-md-7">Sujet</th>
                <th class="col-md-1">Priorité</th>
                <th class="col-md-1">Status</th>
                <th class="col-md-1">Catégorie</th>
                <th class="col-md-2 text-right">Date</th>
            </tr>
            @if(!$tickets->isEmpty())
                @foreach($tickets as $ticket)
                    <tr>
                        <td><a href="{{ url('ticket/'.$ticket->id) }}">{{ $ticket->subject }}</a></td>
                        <td><span class="label" style="background: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span></td>
                        <td><span class="label" style="background: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span></td>
                        <td><span class="label" style="background: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span></td>
                        <td class="text-right">{{ $ticket->updated_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

@stop