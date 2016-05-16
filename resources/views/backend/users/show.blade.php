@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/user') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    @if ( !empty($user) )

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            {!! Form::model($user,array(
                'method' => 'PUT',
                'class'  => 'form-validation form-horizontal',
                'url'    => array('admin/user/'.$user->id)))
            !!}

            <div class="panel-heading">
                <h4>&Eacute;diter {{ $user->name }}</h4>
            </div>
            <div class="panel-body event-info">

                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">Prénom</label>
                    <div class="col-sm-3">
                        {!! Form::text('first_name', $user->first_name , array('class' => 'form-control') ) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">Nom</label>
                    <div class="col-sm-3">
                        {!! Form::text('last_name', $user->last_name , array('class' => 'form-control') ) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-3">
                        {!! Form::text('email', $user->email , array('class' => 'form-control') ) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">Rôle</label>
                    <div class="col-lg-3 col-sm-5 col-xs-9">
                        <select class="form-control" name="role">
                            <option <?php echo ($user->role == 2 ? 'selected' : ''); ?> value="2">Invité (consulter le site)</option>
                            <option <?php echo ($user->role == 1 ? 'selected' : ''); ?> value="1">Administrateur</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">Mot de passe</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

            </div>
            <div class="panel-footer mini-footer ">
                <div class="col-sm-3">{!! Form::hidden('id', $user->id ) !!}</div>
                <div class="col-sm-6">
                    <button class="btn btn-primary" type="submit">Envoyer </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @endif

</div>
<!-- end row -->

@stop