<nav>
    <ul>
        <li><a href="{{ route('index') }}">{{ config('app.name', 'Service Reservation') }}</a></li>

        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endguest

        @auth
            @if (Auth::user()->is_admin)
                <li><a href="{{ route('admins.dashboard') }}">Dashboard</a></li>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')

                <button>Logout</button>
            </form>
        @endauth
    </ul>
</nav>
