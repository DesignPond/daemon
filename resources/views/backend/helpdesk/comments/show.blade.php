@extends('backend.layouts.master')
@section('content')

@if($comment)

    <div class="row"><!-- row -->
        <div class="col-md-12"><!-- col -->
            <p><a class="btn btn-default" href="{!!  url('admin/comment')!!}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-midnightblue">
                <!-- form start -->
                <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" class="form-horizontal" >
                    <input type="hidden" name="_method" value="PUT">{!! csrf_field() !!}

                    <div class="panel-heading">
                        <h4>Éditer un commentaire</h4>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ticket</label>
                            <div class="col-sm-9">
                                <select name="ticket_id" class="form-control" required>
                                    <option value="">Choix</option>
                                    @if(!$tickets->isEmpty())
                                        @foreach($tickets as $ticket)
                                            <option {{ $ticket->id ==  $comment->ticket_id ? 'selected' : '' }} value="{{ $ticket->id }}">{{ $ticket->subject }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" required class="form-control" value="{{ $comment->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Commentaire</label>
                            <div class="col-sm-9">
                                <textarea name="content" required class="form-control redactor">{!! $comment->content !!}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer mini-footer ">
                        <div class="col-sm-3">{!! Form::hidden('id', $comment->id ) !!}</div>
                        <div class="col-sm-9">
                            <button class="btn btn-primary" type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endif
@stop