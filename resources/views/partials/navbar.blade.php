<div style="padding:12px 20px; background-color:#f8f9fa; display:flex; justify-content:space-between; align-items:center; font-family:Arial, sans-serif;">

    <div>
        <a href="{{ route('home') }}" style="margin-right:15px; text-decoration:none;">Home</a>

        @auth
            <a href="{{ route('dashboard') }}" style="margin-right:15px; text-decoration:none;">Dashboard</a>
            <a href="{{ route('habits.index') }}" style="margin-right:15px; text-decoration:none;">My Habits</a>
        @endauth
    </div>

    <div>
        @auth
            <span style="margin-right:15px;">
                Hello, {{ auth()->user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="padding:6px 10px; cursor:pointer;">
                    Logout
                </button>
            </form>

            <a href="{{ route('dashboard') }}">Dashboard</a>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin</a>
            @endif

            <a href="{{ route('habits.index') }}">My Habits</a>
        @endauth

        @guest
            <a href="{{ route('login') }}" style="margin-right:15px; text-decoration:none;">Login</a>
            <a href="{{ route('register') }}" style="text-decoration:none;">Register</a>
        @endguest
    </div>

</div>