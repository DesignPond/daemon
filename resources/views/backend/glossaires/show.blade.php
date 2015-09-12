@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p class="pull-left"><a class="btn btn-default" href="{{ url('admin/glossaire') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
        <p class="pull-right"><a href="{{ url('admin/glossaire/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter un mot dans le glossaire</a></p>
    </div>
</div>

<!-- start row -->
<div class="row">

    @if (!empty($glossaire) )

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form data-validate-parsley action="{{ url('admin/glossaire/'.$glossaire->id) }}" method="POST" class="form-horizontal" >
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>&Eacute;diter {{ $glossaire->keyword }}</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Mots</label>
                        <div class="col-sm-4">
                            {!! Form::text('keyword', $glossaire->keyword , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7">
                            {!! Form::textarea('description',$glossaire->description, array('class' => 'form-control', 'cols' => '50' , 'rows' => '6' )) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer mini-footer ">
                    {!! Form::hidden('id', $glossaire->id ) !!}
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Envoyer </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    @endif

</div>
<!-- end row -->

@stop