@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div style="
    height:80vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    font-family:Arial, sans-serif;
">

    <h1 style="font-size:42px; margin-bottom:10px;">
        Welcome to HabitForge
    </h1>

    <p style="font-size:18px; margin-bottom:30px; color:#555;">
        Build better habits. Track your progress. Stay consistent.
    </p>

    @guest
        <div>
            <a href="{{ route('register') }}"
               style="margin-right:15px; padding:10px 20px; background:#4CAF50; color:white; text-decoration:none; border-radius:6px;">
                Get Started
            </a>

            <a href="{{ route('login') }}"
               style="padding:10px 20px; background:#333; color:white; text-decoration:none; border-radius:6px;">
                Login
            </a>
        </div>
    @endguest

    @auth
        <a href="{{ route('dashboard') }}"
           style="padding:12px 24px; background:#4CAF50; color:white; text-decoration:none; border-radius:6px; margin-top:20px;">
            Go to Dashboard
        </a>
    @endauth

</div>
@endsection