@extends('frontend.layouts.master')

@section('content')

<div class="row fullwidth auth-form"><!-- row -->
    <div class="col-lg-12 clearfix">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Mot de passe perdu</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="/password/email">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
