@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{!!  url('admin/ticket')!!}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-8">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{!!  url('admin/ticket')!!}" enctype="multipart/form-data" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>Ajouter un ticket</h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sujet</label>
                        <div class="col-sm-9">
                            <input type="text" name="subject" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Description du problème</label>
                        <div class="col-sm-9">
                            <textarea name="content" required class="form-control redactor"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-4">
                            <label>Catégorie</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Choix</option>
                                @if(!$categories->isEmpty())
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <option value="{{ $prioritie->id }}">{{ $prioritie->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                </div>
                <div class="panel-footer mini-footer">
                    <div class="col-sm-3">
                        <input name="status_id" value="1" type="hidden">
                    </div>
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