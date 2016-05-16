@extends('auth.layouts.auth')
@section('content')

    <div class="login-wrapper">

        @if(isset($errors) && $errors->has())
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                            <p style="font-size: 14px;">{{ $message }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="helper center">
            <a href="{{ url('/') }}" class="logo-image animated">
                <img style="color:#000;" src="{{ asset('frontend/images/logos/logo-small-b.svg') }}" alt="logo">
            </a>
        </div>
        <form class="login-form" method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="login-inputs">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="button blue full">Login</button>
        </form>
        <ul class="login-helpers">
            <li class="login-helper-item">
                <a href="/password/email">Mot de passe perdu?</a>
            </li>
        </ul>
    </div>

@endsection
