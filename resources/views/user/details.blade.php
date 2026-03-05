@extends('layouts.app')

@section('title')
    Habit Details
@endsection

@section('content')
    <h1>{{ $habit }}</h1>

    <p>Current Streak: {{ $streak }} days</p>

    <a href="{{ route('user.habits') }}">Back to Habits</a>
@endsection
