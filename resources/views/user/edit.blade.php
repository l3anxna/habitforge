@extends('layouts.app')

@section('title')
Edit Habit
@endsection

@section('content')

<h1>Edit Habit</h1>

<form method="POST" action="{{ route('user.habit.update') }}">
    @csrf

    <input type="hidden" name="old_name" value="{{ $habit }}">

    <label>Habit Name:</label>
    <input type="text" name="habit" value="{{ $habit }}">

    <button type="submit">Update</button>
</form>

@endsection