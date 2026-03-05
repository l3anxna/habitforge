@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <h1>Register</h1>

    {{-- Show success message --}}
    @if (session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Show validation errors --}}
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>

        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>

        @error('email')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required>

        @error('password')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="password_confirmation" required>

        <br><br>

        <button type="submit">Register</button>

    </form>

    <br>

    <a href="{{ route('login') }}">Go to Login</a>
@endsection
