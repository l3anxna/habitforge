@extends('layouts.app')

@section('title', 'Create Habit')

@section('content')

    <h1>Create New Habit</h1>

    <div class="card">

        <form method="POST" action="{{ route('habits.store') }}">
            @csrf

            <label>Habit Name</label>
            <br><br>

            <input type="text" name="name" value="{{ old('name') }}" placeholder="Example: Drink Water" required>

            <br><br>

            <button class="btn">
                Create Habit
            </button>

        </form>

    </div>

@endsection
