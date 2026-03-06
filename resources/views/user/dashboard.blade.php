@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold mb-8">
            Dashboard
        </h1>

        {{-- Stats --}}
        <div class="grid md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-gray-500">Total Habits</h3>
                <p class="text-3xl font-bold">
                    {{ $totalHabits }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-gray-500">Completed Today</h3>
                <p class="text-3xl font-bold text-green-600">
                    {{ $todayCheckins }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-gray-500">Completion Rate</h3>
                <p class="text-3xl font-bold text-indigo-600">
                    {{ $completionRate }}%
                </p>
            </div>

        </div>


        {{-- Habit Checkin List --}}
        <h2 class="text-2xl font-bold mb-6">
            Today's Habits
        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            @foreach ($habits as $habit)
                <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

                    <div>

                        <h3 class="text-lg font-semibold">
                            {{ $habit->name }}
                        </h3>

                        <p class="text-sm text-orange-500">
                            🔥 {{ $habit->streak() }} day streak
                        </p>

                    </div>

                    @if ($habit->checkins->count())
                        <span class="text-green-600 font-semibold">
                            ✔ Completed
                        </span>
                    @else
                        <form method="POST" action="{{ route('habits.checkin', $habit->id) }}">
                            @csrf

                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                Check-in
                            </button>

                        </form>
                    @endif

                </div>
            @endforeach

        </div>

    </div>
@endsection
