@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Dashboard</h1>

    <div class="card">
        <h3>Overall Completion</h3>
        <p style="font-size:24px;">{{ $completionRate }}%</p>
    </div>

    <h2>Today's Habits</h2>

    @foreach ($habits as $habit)
        <div class="card">

            <h3>{{ $habit->name }}</h3>

            <p>🔥 Streak: {{ $habit->checkins->count() }} days</p>

            @if ($habit->checkins->where('checked_at', today())->count())
                <p style="color:green;">Completed Today ✅</p>
            @else
                <p style="color:#e74c3c;">Not Completed</p>

                <form method="POST" action="{{ route('habits.checkin', $habit->id) }}">
                    @csrf
                    <button class="btn">Daily Check-in</button>
                </form>
            @endif

        </div>
    @endforeach
@endsection
