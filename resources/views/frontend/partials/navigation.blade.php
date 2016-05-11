<nav class="right helper">
    <ul class="menu sf-menu js-menu">
        <li><a href="{{ url('/') }}" title="accueil">Accueil</a></li>
        <li><a href="{{ url('ticket') }}">Support</a></li>
        <li>
            @if (!Auth::check())
                <a href="{{ url('auth/login')}}" class="btn btn-default btn-sm pull-right">Login</a>
            @endif
            @if (Auth::check())
                    <a href="{{ url('auth/logout')}}" class="btn btn-default btn-sm pull-right">Logout</a>
            @endif
        </li>
    </ul>
</nav>