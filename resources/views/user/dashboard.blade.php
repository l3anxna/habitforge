@extends('layouts.footer')

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
            <strong>{{ $habit['name'] }}</strong>
            <br>
            Streak: {{ $habit['streak'] }} days
            <br>
            Status:
            @if($habit['completed'])
                Completed ✅
            @else
                Not Completed ❌

                <form method="POST" action="{{ route('habit.checkin', $habit['name']) }}">
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