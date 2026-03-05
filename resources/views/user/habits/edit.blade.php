@extends('layouts.app')

@section('title', 'Edit Habit')

@section('content')

    <h1>Edit Habit</h1>

    @if ($errors->any())
        <div style="color:red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('habits.update', $habit->id) }}">
        @csrf
        @method('PUT')

        <label>Habit Name:</label>
        <input type="text" name="name" value="{{ old('name', $habit->name) }}" required>

        <button type="submit">Update</button>
    </form>

@endsection
