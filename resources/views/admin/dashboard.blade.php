@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <h1>Admin Dashboard</h1>

    <div style="display:flex; gap:20px;">

        <div class="card">
            <h3>Total Users</h3>
            <p style="font-size:28px;">
                {{ $totalUsers }}
            </p>
        </div>

        <div class="card">
            <h3>Total Habits</h3>
            <p style="font-size:28px;">
                {{ $totalHabits }}
            </p>
        </div>

    </div>

@endsection
