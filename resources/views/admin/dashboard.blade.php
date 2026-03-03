@extends('layouts.app')

@section('title')
Admin Dashboard
@endsection

@section('content')

<h1>Admin Dashboard</h1>

<p>Total Users: {{ $totalUsers }}</p>
<p>Total Habits: {{ $totalHabits }}</p>

@endsection