@extends('layouts.app')

@section('title', 'My Habits')

@section('content')

<h1>My Habits</h1>

<a href="{{ route('habits.create') }}">Create New Habit</a>

<hr>

<ul>
@forelse($habits as $habit)
    <li>
        <strong>{{ $habit->name }}</strong>

        <a href="{{ route('habits.show', $habit->id) }}">View</a>
        <a href="{{ route('habits.edit', $habit->id) }}">Edit</a>

        <form method="POST"
              action="{{ route('habits.destroy', $habit->id) }}"
              style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@empty
    <p>No habits created yet.</p>
@endforelse
</ul>

@endsection