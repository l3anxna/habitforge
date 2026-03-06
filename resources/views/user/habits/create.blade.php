@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-16">

        <div class="bg-white shadow-lg rounded-xl p-8">

            <h2 class="text-2xl font-bold mb-6">
                Create New Habit
            </h2>

            <form method="POST" action="{{ route('habits.store') }}">
                @csrf

                <label class="block mb-2 font-medium">
                    Habit Name
                </label>

                <input type="text" name="name" placeholder="e.g. Exercise, Read, Meditate" required
                    class="w-full border rounded-lg px-4 py-2 mb-6 focus:ring-2 focus:ring-indigo-500">

                <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                    Create Habit
                </button>

            </form>

        </div>

    </div>
@endsection
