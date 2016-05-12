@extends('frontend.layouts.master')
@section('content')

    <p><a href="{{ url('ticket') }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-left"></i> &nbsp;Retour</a></p>
    <h2>Archives</h2>

    <div class="panel">
        <a href="{{ url('ticket') }}" class="btn btn-sm btn-default">En cours <span class="badge">{{ $tickets->count() }}</span></a>
        <a href="{{ url('ticket/complete') }}" class="btn btn-sm btn-primary">Résolus <span class="badge">{{ $complete->count() }}</span></a>
        <hr/>
        <h3>Tickets résolus</h3>
        <table class="table table-striped">
            <tr>
                <th class="col-md-7">Sujet</th>
                <th class="col-md-1">Priorité</th>
                <th class="col-md-1">Status</th>
                <th class="col-md-1">Catégorie</th>
                <th class="col-md-2 text-right">Résolu</th>
            </tr>
            @if(!$complete->isEmpty())
                @foreach($complete as $ticket)
                    <tr>
                        <td><a href="{{ url('ticket/'.$ticket->id) }}">{{ $ticket->subject }}</a></td>
                        <td><span class="label" style="background: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span></td>
                        <td><span class="label" style="background: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span></td>
                        <td><span class="label" style="background: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span></td>
                        <td class="text-right">{{ $ticket->completed_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

@stop