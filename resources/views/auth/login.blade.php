@extends('layouts.app')

@section('title')
Login
@endsection

@section('content')

<h1>Login</h1>

@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Login</button>
</form>

<br>
<a href="{{ route('register') }}">Go to Register</a>

@endsection