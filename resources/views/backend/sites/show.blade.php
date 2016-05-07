@extends('backend.layouts.master')
@section('content')

@if($site)

    <div class="row"><!-- row -->
        <div class="col-md-12"><!-- col -->
            <p><a class="btn btn-default" href="{!!  url('admin/site')!!}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-midnightblue">
                <!-- form start -->
                <form action="{{ url('admin/site/'.$site->id) }}" method="POST" class="form-horizontal" >
                    <input type="hidden" name="_method" value="PUT">
                    {!! csrf_field() !!}
                    <div class="panel-heading">
                        <h4>Éditer un site</h4>
                    </div>
                    <div class="panel-body event-info">
                        <div class="form-group">
                            <label for="message" class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" name="nom" value="{{ $site->nom }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-3 control-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" name="slug" value="{{ $site->slug }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="redactor form-control" name="description">{{ $site->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer mini-footer ">
                        <div class="col-sm-3">
                            {!! Form::hidden('id', $site->id ) !!}
                        </div>
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