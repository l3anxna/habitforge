@extends('layouts.footer')

@section('title')
Admin Dashboard
@endsection

@section('content')

<h1>Admin Dashboard</h1>

<p>Total Users: {{ $totalUsers }}</p>
<p>Total Habits: {{ $totalHabits }}</p>

<br>

<a href="{{ route('admin.users') }}">Manage Users</a>

</body>

@endsection