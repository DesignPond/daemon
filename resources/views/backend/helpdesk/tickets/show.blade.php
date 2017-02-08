@extends('backend.layouts.master')
@section('content')

@if($ticket)

    <div class="row"><!-- row -->
        <div class="col-md-12"><!-- col -->
            <p><a class="btn btn-default" href="{!!  url('admin/ticket')!!}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-midnightblue">
                <!-- form start -->
                <form action="{{ url('admin/ticket/'.$ticket->id) }}" method="POST" class="form-horizontal" >
                    <input type="hidden" name="_method" value="PUT">{!! csrf_field() !!}

                    <div class="panel-heading">
                        <h4>Éditer un ticket</h4>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Marquer comme résolu</label>
                            <div class="col-sm-4">
                                <input type="text" name="completed_at" placeholder="date" class="form-control datePicker" value="{{ $ticket->completed_at ? $ticket->completed_at->format('Y-m-d') : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sujet</label>
                            <div class="col-sm-9">
                                <input type="text" name="subject" required class="form-control" value="{{ $ticket->subject }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description du problème</label>
                            <div class="col-sm-9">
                                <textarea name="content" required class="form-control redactor">{!! $ticket->content !!}</textarea>
                            </div>
                        </div>

                        @if(!$ticket->comments->isEmpty())
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Commentaires</label>
                                <div class="col-sm-9">
                                    <div class="well well-sm">
                                        @foreach($ticket->comments as $comment)
                                            {!! $comment->content !!}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-4">
                                <label>Catégorie</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Choix</option>
                                    @if(!$categories->isEmpty())
                                        @foreach($categories as $category)
                                            <option {{ $category->id ==  $ticket->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Priorité</label>
                                <select name="priority_id" class="form-control" required>
                                    <option value="">Choix</option>
                                    @if(!$priorities->isEmpty())
                                        @foreach($priorities as $prioritie)
                                            <option {{ $prioritie->id ==  $ticket->priority_id ? 'selected' : '' }} value="{{ $prioritie->id }}">{{ $prioritie->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer mini-footer ">
                        <div class="col-sm-3">{!! Form::hidden('id', $ticket->id ) !!}</div>
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