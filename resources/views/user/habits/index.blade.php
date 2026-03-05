@extends('layouts.app')

@section('title', 'My Habits')

@section('content')

    <h1>My Habits</h1>

    <a href="{{ route('habits.create') }}" class="btn">
        + Create Habit
    </a>

    <br><br>

    @forelse($habits as $habit)
        <div class="card">

            <h3>{{ $habit->name }}</h3>

            <a href="{{ route('habits.edit', $habit->id) }}" style="margin-left:10px;">
                Edit
            </a>

            <form method="POST" action="{{ route('habits.destroy', $habit->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')

                <button class="btn-danger">
                    Delete
                </button>

            </form>

        </div>

    @empty

        <div class="card">
            <p>No habits created yet.</p>
        </div>
    @endforelse

@endsection
