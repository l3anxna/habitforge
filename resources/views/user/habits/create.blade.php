@extends('layouts.app')

@section('title', 'Create Habit')

@section('content')

<h1>Create Habit</h1>

@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('habits.store') }}">
    @csrf

    <label>Habit Name:</label>

    <input
    type="text"
    name="name"
    value="{{ old('name') }}"
    required
    placeholder="Example: Drink Water"
    >

    <br><br>

    <button type="submit">Create</button>
</form>

@endsection