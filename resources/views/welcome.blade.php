<!DOCTYPE html>
<html>
<head>
    <title>HabitForge</title>
</head>

<body style="
    margin:0;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    background-color:#f5f5f5;
    font-family:Arial, sans-serif;
">

    <div style="
        position:absolute;
        top:20px;
        right:30px;
    ">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" style="margin-right:15px;">Dashboard</a>
            @else
                <a href="{{ route('login') }}" style="margin-right:15px;">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <img src="{{ asset('images/habitforge-hero.png') }}"
         alt="HabitForge Illustration"
         style="
            max-width:80%;
            max-height:80vh;
            object-fit:contain;
            border-radius:20px;
            box-shadow:0 20px 40px rgba(0,0,0,0.2);
         ">

</body>
</html>