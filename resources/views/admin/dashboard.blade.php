@extends('layouts.app')

@section('title')
Admin Dashboard
@endsection

@section('content')

<h1>Admin Dashboard</h1>

<div>
    <h3>Total Users</h3>
    <p>{{ $totalUsers }}</p>
</div>

<div>
    <h3>Total Habits</h3>
    <p>{{ $totalHabits }}</p>
</div>

@endsection