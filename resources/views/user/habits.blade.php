@extends('layouts.app')

@section('title')
Habits List
@endsection

@section('content')

<h1>My Habits</h1>

<ul>
    @foreach($habits as $habit)
        <li>
            {{ $habit }}
            <a href="{{ route('user.habit.details', $habit) }}">View</a>
            <a href="{{ route('user.habit.edit', $habit) }}">Edit</a>
        </li>
    @endforeach
</ul>

<a href="{{ route('user.habit.create') }}">Create New Habit</a>

@endsection