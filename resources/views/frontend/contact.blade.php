@extends('frontend.layouts.master')
@section('content')

<div id="k-sidebar">
    <!-- Sidebar  -->
    @include('frontend.partials.sidebar')
</div><!-- sidebar wrapper end -->

<div id="k-main"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->
        <div class="row gutter"><!-- row -->
            <div class="col-lg-12 col-md-12">

                <h1 class="page-title">Contact</h1>
                <div class="news-body">
                    <p>Une question ou une demande d'information?</p>
                    <form id="contactform" method="post" action="{{ url('sendMessage') }}">
                        {!! csrf_field() !!}
                        <div class="row"><!-- starts row -->
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="contactName"><span class="required">*</span> Nom</label>
                                <input type="text" aria-required="true" size="30" value="{{ old('name') }}" name="name" id="name" class="form-control requiredField" />
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="email"><span class="required">*</span> E-mail</label>
                                <input type="text" aria-required="true" size="30" value="{{ old('email') }}" name="email" id="email" class="form-control requiredField" />
                            </div>
                        </div><!-- ends row -->

                        <div class="row"><!-- starts row -->
                            <div class="form-group clearfix col-lg-12">
                                <label for="remarque"><span class="required">*</span> Message</label>
                                <textarea aria-required="true" rows="5" cols="45" name="remarque" id="remarque" class="form-control requiredField mezage">{{ old('remarque') }}</textarea>
                            </div>
                            <div class="form-group clearfix col-lg-12 text-right remove-margin-bottom">
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                <input type="submit" value="Envoyer" id="submit" name="submit" class="btn btn-default" />
                            </div>
                        </div><!-- ends row -->
                    </form>

                </div>
            </div>
        </div><!-- row end -->
    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->

@stop