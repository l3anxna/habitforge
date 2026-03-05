@extends('layouts.app')

@section('title')
User Dashboard
@endsection

@section('content')

<h1>User Dashboard</h1>

<p>Overall Completion: {{ $completionRate }}%</p>

<h2>Today's Habits</h2>

<ul>
@foreach($habits as $habit)

    <li>
        <strong>{{ $habit->name }}</strong>
    <br>
        Streak: {{ $habit->checkins->count() }} days
    <br>

    @if($habit->checkins->where('checked_at', today())->count())

        Completed ✅

    @else

        Not Completed ❌

    <form method="POST" action="{{ route('habits.checkin', $habit->id) }}">
    @csrf
        <button type="submit">Daily Check-in</button>
        </form>

@endif

<br><br>

</li>

@endforeach
</ul>

<a href="/">Back Home</a>

@endsection