<div
    style="
background:white;
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
">

    <div>

        <a href="{{ route('home') }}" style="font-weight:bold; margin-right:20px;">
            HabitForge
        </a>

        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('habits.index') }}" style="margin-left:15px;">My Habits</a>
        @endauth

    </div>

    <div>

        @auth

            <span style="margin-right:15px;">
                Hello, {{ auth()->user()->name }}
            </span>

            @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" style="margin-right:15px;">Admin</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button class="btn-dark">Logout</button>
            </form>

        @endauth

        @guest
            <a href="{{ route('login') }}" style="margin-right:15px;">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        @endguest

    </div>

</div>
