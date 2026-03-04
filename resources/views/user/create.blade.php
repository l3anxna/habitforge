@extends('layouts.app')

@section('title')
Create Habit
@endsection

@section('content')

<h1>Create Habit</h1>

<form method="POST" action="{{ route('user.habit.store') }}">
    @csrf

    <label>Habit Name:</label>
    <input type="text" name="habit">

    <button type="submit">Create</button>
</form>

@endsection