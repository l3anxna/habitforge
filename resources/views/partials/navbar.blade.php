<div style="padding:10px; background-color:#f2f2f2;">
    <a href="/">Home</a> |

    @if(session('role') == 'user')
        <a href="{{ route('user.dashboard') }}">Dashboard</a> |
    @endif

    @if(session('role') == 'admin')
        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a> |
        <a href="{{ route('admin.users') }}">Manage Users</a> |
    @endif

    @if(session('role'))
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('register') }}">Register</a>
    @endif
</div>