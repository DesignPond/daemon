@extends('frontend.layouts.auth')
@section('content')

    <div class="login-wrapper">
        <div class="helper center">
            <!-- Logo Image -->
            <a href="{{ url('/') }}" class="logo-image animated">
                <img style="color:#000;" src="{{ asset('frontend/images/logos/logo-small-b.svg') }}" alt="logo">
            </a>
            <!-- End of Logo Image -->
        </div>
        <form class="login-form" method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="login-inputs">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="button blue full">Sign in</button>
        </form>
        <ul class="login-helpers">
            <li class="login-helper-item">
                <a href="/password/email">Mot de passe perdu?</a>
            </li>
        </ul>
    </div>

@endsection
