@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <h1>Login</h1>

    <div class="card">

        @if ($errors->any())
            <div style="color:red;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <label>Email</label>
            <br><br>

            <input type="email" name="email" value="{{ old('email') }}" required>

            <br><br>

            <label>Password</label>
            <br><br>

            <input type="password" name="password" required>

            <br><br>

            <button class="btn-dark">
                Login
            </button>

        </form>

        <br>

        <a href="{{ route('register') }}">
            Create an account
        </a>

    </div>

@endsection
