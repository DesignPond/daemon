@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p class="pull-left"><a class="btn btn-default" href="{{ url('admin/link') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
        <p class="pull-right"><a href="{{ url('admin/link/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter un lien</a></p>
    </div>
</div>

<!-- start row -->
<div class="row">

    @if (!empty($link) )

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form data-validate-parsley action="{{ url('admin/link/'.$link->id) }}" method="POST" class="form-horizontal" >
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>&Eacute;diter {{ $link->titre }}</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Catégorie</label>
                        <div class="col-sm-4">

                            <select class="form-control" name="parent_id">
                                <option {{ $link->id == 0 ? 'checked' : '' }} value="0">Général</option>
                                @if(!empty($categories))
                                    @foreach($categories as $categorie)
                                        <option {{ $link->parent_id == $categorie->id ? 'selected' : '' }} value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('titre', $link->titre , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-sm-3 control-label">Url</label>
                        <div class="col-sm-7">
                            {!! Form::text('url', $link->url , array('class' => 'form-control') ) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer mini-footer ">
                    {!! Form::hidden('id', $link->id ) !!}
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