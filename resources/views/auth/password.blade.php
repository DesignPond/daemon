@extends('auth.layouts.master')
@section('content')

    <div class="login-wrapper">
        <div class="helper center">
            <!-- Logo Image -->
            <a href="{{ url('/') }}" class="logo-image animated">
                <img style="color:#000;" src="{{ asset('frontend/images/logos/logo-small-b.svg') }}" alt="logo">
            </a>
            <!-- End of Logo Image -->
        </div>
        <form class="login-form" method="POST" action="/password/email">
            {!! csrf_field() !!}
            <div class="login-inputs">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <button type="submit" class="button blue full">Envoyer</button>
        </form>
    </div>

@endsection
