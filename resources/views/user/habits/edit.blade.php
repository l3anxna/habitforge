@extends('layouts.app')

@section('title', 'Edit Habit')

@section('content')

    <div class="max-w-xl mx-auto px-6 py-16">

        <div class="bg-white rounded-xl shadow-lg p-8">

            <h1 class="text-2xl font-bold mb-6">
                ✏️ Edit Habit
            </h1>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-100 text-red-700 p-4 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('habits.update', $habit->id) }}">
                @csrf
                @method('PUT')

                <label class="block text-sm font-medium mb-2">
                    Habit Name
                </label>

                <input type="text" name="name" value="{{ old('name', $habit->name) }}" required
                    class="w-full border rounded-lg px-4 py-2 mb-6 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                <div class="flex gap-4">

                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Update Habit
                    </button>

                    <a href="/habits" class="bg-gray-200 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
