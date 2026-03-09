@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            {{ $user->name }}'s Habits
        </h1>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                            Habit
                        </th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                            Total Check-ins
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($habits as $habit)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4 text-gray-800 font-medium">
                                {{ $habit->name }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm font-semibold bg-indigo-100 text-indigo-700 rounded-full">
                                    {{ $habit->checkins_count }}
                                </span>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-6 text-gray-500">
                                No habits found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
