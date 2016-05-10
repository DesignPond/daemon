@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{!!  url('admin/comment')!!}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-8">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{!!  url('admin/comment')!!}" enctype="multipart/form-data" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>Ajouter un commentaire</h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ticket</label>
                        <div class="col-sm-9">
                            <select name="ticket_id" class="form-control" required>
                                <option value="">Choix</option>
                                @if(!$tickets->isEmpty())
                                    @foreach($tickets as $ticket)
                                        <option value="{{ $ticket->id }}">{{ $ticket->subject }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Commentaire</label>
                        <div class="col-sm-9">
                            <textarea name="content" required class="form-control redactor"></textarea>
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