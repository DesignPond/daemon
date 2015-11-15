@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/page') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste des pages</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form data-validate-parsley action="{{ url('admin/page') }}" method="POST" class="form-horizontal" >
            {!! csrf_field() !!}

                <div class="panel-heading"><h4>Ajouter une page</h4></div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Hiérarchie</label>
                        <div class="col-sm-4">

                            <select class="form-control" name="parent_id">
                                <option value="0">Base</option>
                                @if(!empty($pages))
                                    @foreach($pages as $parent_id => $page)
                                        <option value="{{ $parent_id }}">{{ $page }}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('title', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Ordre</label>
                        <div class="col-sm-1">
                            {!! Form::text('rang', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contenu" class="col-sm-3 control-label">Contenu</label>
                        <div class="col-sm-7">
                            {!! Form::textarea('content', null, array('class' => 'form-control  redactor', 'cols' => '50' , 'rows' => '4' )) !!}
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