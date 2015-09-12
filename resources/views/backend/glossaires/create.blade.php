@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/glossaire') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste des glossaires</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form data-validate-parsley action="{{ url('admin/glossaire') }}" method="POST" class="form-horizontal" >
            {!! csrf_field() !!}

                <div class="panel-heading"><h4>Ajouter des mots</h4></div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Mots</label>
                        <div class="col-sm-4">
                            {!! Form::text('keyword', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-4">
                            {!! Form::textarea('description',null, array('class' => 'form-control', 'cols' => '50' , 'rows' => '6' )) !!}
                        </div>
                    </div>

                </div>
                <div class="panel-footer mini-footer ">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- end row -->

@stop