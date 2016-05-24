@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-4">
        <h3>Tickets</h3>
    </div>
    <div class="col-md-8">
        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/ticket/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4>En cours</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-3">Sujet</th>
                            <th class="col-sm-3">Priorité</th>
                            <th class="col-sm-3">Statut</th>
                            <th class="col-sm-3">Catégorie</th>
                            <th class="col-sm-3">Date</th>
                            <th class="col-sm-2 no-sort"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">
                            @if(!$tickets->isEmpty())
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td><a class="btn btn-sm btn-info" href="{{ url('admin/ticket/'.$ticket->id) }}"><i class="fa fa-edit"></i></a></td>
                                        <td>{{ $ticket->subject }}</td>
                                        <td><span class="label" style="background: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span></td>
                                        <td><span class="label" style="background: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span></td>
                                        <td><span class="label" style="background: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span></td>
                                        <td class="text-right">{{ $ticket->updated_at->format('Y-m-d') }}</td>
                                        <td class="text-right">
                                            <form action="{{ url('admin/ticket/'.$ticket->id) }}" method="POST" class="form-horizontal">
                                                <input type="hidden" name="_method" value="DELETE">{!! csrf_field() !!}
                                                <button data-what="Supprimer" data-action="{{ $ticket->subject }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <h4>Résolus</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-3">Sujet</th>
                            <th class="col-sm-3">Priorité</th>
                            <th class="col-sm-3">Statut</th>
                            <th class="col-sm-3">Catégorie</th>
                            <th class="col-sm-3">Date</th>
                            <th class="col-sm-2 no-sort"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">
                        @if(!$resolved->isEmpty())
                            @foreach($resolved as $ticket)
                                <tr>
                                    <td><a class="btn btn-sm btn-info" href="{{ url('admin/ticket/'.$ticket->id) }}"><i class="fa fa-edit"></i></a></td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td><span class="label" style="background: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span></td>
                                    <td><span class="label" style="background: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span></td>
                                    <td><span class="label" style="background: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span></td>
                                    <td class="text-right">{{ $ticket->updated_at->format('Y-m-d') }}</td>
                                    <td class="text-right">
                                        <form action="{{ url('admin/ticket/'.$ticket->id) }}" method="POST" class="form-horizontal">
                                            <input type="hidden" name="_method" value="DELETE">{!! csrf_field() !!}
                                            <button data-what="Supprimer" data-action="{{ $ticket->subject }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>

    </div>
</div>


@stop