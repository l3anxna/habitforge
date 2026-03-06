@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white">

        <div class="max-w-6xl mx-auto px-6 py-24 text-center">

            <h1 class="text-5xl font-bold mb-6">
                Build Better Habits 🔥
            </h1>

            <p class="text-xl mb-8 opacity-90">
                Track your daily habits, build streaks, and improve yourself every day.
            </p>

            <div class="flex justify-center gap-4">

                <a href="/register"
                    class="bg-white text-indigo-600 px-6 py-3 rounded-xl font-semibold hover:scale-105 transition">
                    Start Building Habits
                </a>

                <a href="/about"
                    class="border border-white px-6 py-3 rounded-xl hover:bg-white hover:text-indigo-600 transition">
                    Learn More
                </a>

            </div>

        </div>

    </div>
@endsection
