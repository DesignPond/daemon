@extends('backend.layouts.master')
@section('content')

@if($priority)

    <div class="row"><!-- row -->
        <div class="col-md-12"><!-- col -->
            <p><a class="btn btn-default" href="{!!  url('admin/priority')!!}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-midnightblue">
                <!-- form start -->
                <form action="{{ url('admin/priority/'.$priority->id) }}" method="POST" class="form-horizontal" >
                    <input type="hidden" name="_method" value="PUT">{!! csrf_field() !!}

                    <div class="panel-heading">
                        <h4>Éditer une priorité</h4>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $priority->name }}" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="col-sm-3 control-label">Couleur</label>
                            <div class="col-sm-3">
                                {!! Form::text('color', $priority->color , array('required' => 'required','class' => 'form-control colorpicker') ) !!}
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer mini-footer ">
                        <div class="col-sm-3">{!! Form::hidden('id', $priority->id ) !!}</div>
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