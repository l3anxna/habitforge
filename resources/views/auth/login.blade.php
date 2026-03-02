<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

@if(isset($message))
    <p>{{ $message }}</p>
@endif

<form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <label>Email:</label>
    <input type="email" name="email">
    <br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <br><br>

    <button type="submit">Login</button>
</form>

<br>
<a href="{{ route('register') }}">Go to Register</a>

</body>
</html>