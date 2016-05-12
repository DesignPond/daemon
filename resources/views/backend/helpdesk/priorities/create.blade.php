@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{!!  url('admin/priority')!!}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-8">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{!!  url('admin/priority')!!}" enctype="multipart/form-data" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>Ajouter une priorité</h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" required class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Couleur</label>
                        <div class="col-sm-3">
                            {!! Form::text('color', '#000000' , array('required' => 'required','class' => 'form-control colorpicker') ) !!}
                        </div>
                    </div>

                </div>
                <div class="panel-footer mini-footer">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </div>

           </form>

        </div>
    </div>

</div>
<!-- end row -->

@stop