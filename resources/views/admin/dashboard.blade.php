@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold mb-8">
            Admin Dashboard
        </h1>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-gray-500">Users</h3>
                <p class="text-3xl font-bold">{{ $users->count() }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-gray-500">Habits</h3>
                <p class="text-3xl font-bold">{{ $habits->count() }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-gray-500">Checkins</h3>
                <p class="text-3xl font-bold">{{ $checkins->count() }}</p>
            </div>

        </div>

    </div>
@endsection
