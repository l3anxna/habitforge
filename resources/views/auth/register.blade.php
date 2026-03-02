<html>
<head>
    <title>Register</title>
</head>
<body>

<h1>Register</h1>

@if(isset($message))
    <p>{{ $message }}</p>
@endif

<form method="POST" action="{{ route('register.submit') }}">
    @csrf

    <label>Name:</label>
    <input type="text" name="name">
    <br><br>

    <label>Email:</label>
    <input type="email" name="email">
    <br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <br><br>

    <button type="submit">Register</button>
</form>

<br>
<a href="{{ route('login') }}">Go to Login</a>

</body>
</html>