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
        <form class="login-form" method="POST" action="/password/reset">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="login-inputs">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                <input type="password" class="form-control" placeholder="Confirmation mot de passe" name="password_confirmation">
            </div>
            <button type="submit" class="button blue full">Reset</button>
        </form>
    </div>

@endsection
