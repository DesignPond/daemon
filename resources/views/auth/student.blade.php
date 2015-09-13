@extends('frontend.layouts.master')

@section('content')

    <div class="row fullwidth auth-form auth-form_height"><!-- row -->
        <div class="col-lg-12 clearfix">

            <br/>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Accès au site</div>
                        <div class="panel-body" id="formLogin">

                            <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                                {!! csrf_field() !!}

                                <input type="hidden" class="form-control" name="email" value="info@methodologie.ch">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Code d'accès</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="password">
                                        <p class="help-block">Même que sur Claroline</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Entrer</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- row end -->

@endsection
