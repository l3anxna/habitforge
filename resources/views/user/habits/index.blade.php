@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold">
                My Habits
            </h1>

            <a href="/habits/create" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
                + Create Habit
            </a>

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            @foreach ($habits as $habit)
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                    <div class="flex justify-between items-center mb-4">

                        <h2 class="text-xl font-semibold">
                            {{ $habit->name }}
                        </h2>

                        <span class="text-sm text-orange-500 font-medium">
                            🔥 Streak
                        </span>

                    </div>

                    <div class="flex gap-3">

                        <a href="/habits/{{ $habit->id }}/edit"
                            class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-sm">
                            Edit
                        </a>

                        <form method="POST" action="/habits/{{ $habit->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
@endsection
