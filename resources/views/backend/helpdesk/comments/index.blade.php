@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-4">
        <h3>Comments</h3>
    </div>
    <div class="col-md-8">
        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/comment/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-2">Ticket</th>
                            <th class="col-sm-2">Nom</th>
                            <th class="col-sm-4">Commentaire</th>
                            <th class="col-sm-2 no-sort"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">
                            @if(!$comments->isEmpty())
                                @foreach($comments as $comment)
                                    <tr>
                                        <td><a class="btn btn-sm btn-info" href="{{ url('admin/comment/'.$comment->id) }}"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="{{ url('admin/ticket/'.$comment->ticket->id)  }}">{{ $comment->ticket->subject }}</a></td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{!! $comment->content !!}</td>
                                        <td class="text-right">
                                            <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" class="form-horizontal">
                                                <input type="hidden" name="_method" value="DELETE">{!! csrf_field() !!}
                                                <button data-what="Supprimer" data-action="{{ $comment->subject }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if(!$comments->isEmpty())
                        {!! $comments->render() !!}
                    @endif
                </div>
            </div>

    </div>
</div>


@stop