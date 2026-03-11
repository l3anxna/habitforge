@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold mb-8">
            Dashboard
        </h1>

        {{-- Flash: badges awarded --}}
        @if (session('badges_awarded'))
            @php $data = session('badges_awarded'); @endphp
            <div id="badge-toast" class="fixed top-6 right-6 bg-white p-4 rounded-lg shadow-lg flex items-center gap-4 animate-pop">
                <div class="w-12 h-12 flex items-center justify-center bg-yellow-100 rounded-full">
                    <!-- medal SVG -->
                    <svg class="w-8 h-8 text-yellow-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 8.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z" fill="currentColor"/><path d="M7 3l2.5 3H14L16 3l-4-1-5 1z" fill="currentColor" opacity="0.2"/></svg>
                </div>
                <div>
                    <div class="font-semibold">Badge earned!</div>
                    <div class="text-sm text-gray-600">{{ $data['habit'] }} — {{ implode(', ', $data['types']) }}</div>
                </div>
            </div>
        @endif

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

                        {{-- Badges list --}}
                        <div class="mt-3 flex items-center gap-3">
                            @foreach ($habit->badges as $badge)
                                <div class="flex items-center gap-2">
                                    <span class="badge-icon" title="{{ $badge->type }}">
                                        @if(str_contains($badge->type, '7'))
                                            <!-- small medal -->
                                            <svg class="w-6 h-6 text-yellow-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2l2.09 6.26L20 10l-5 3.64L16.18 20 12 16.9 7.82 20 9 13.64 4 10l5.91-1.74L12 2z" fill="currentColor"/></svg>
                                        @elseif(str_contains($badge->type, '30'))
                                            <!-- ribbon -->
                                            <svg class="w-6 h-6 text-indigo-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2l3 7h7l-5.5 4.5L19 22l-7-4-7 4 1.5-8.5L2 9h7l3-7z" fill="currentColor"/></svg>
                                        @elseif(str_contains($badge->type, '90'))
                                            <!-- star -->
                                            <svg class="w-6 h-6 text-green-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 .587l3.668 7.431L24 9.748l-6 5.848L19.335 24 12 19.771 4.665 24 6 15.596 0 9.748l8.332-1.73L12 .587z" fill="currentColor"/></svg>
                                        @else
                                            <!-- trophy for 365 -->
                                            <svg class="w-6 h-6 text-purple-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 2h12v4a6 6 0 01-6 6 6 6 0 01-6-6V2zM4 18v2h16v-2a4 4 0 00-4-4H8a4 4 0 00-4 4z" fill="currentColor"/></svg>
                                        @endif
                                    </span>
                                    <span class="text-xs text-gray-600">{{ $badge->type }}</span>
                                </div>
                            @endforeach
                        </div>

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

    <style>
        /* small pop animation for toast and newly displayed badges */
        @keyframes pop {
            0% { transform: scale(0.6); opacity: 0; }
            60% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); }
        }

        .animate-pop {
            animation: pop 450ms cubic-bezier(.2,.9,.3,1);
        }

        .badge-icon svg {
            transform-origin: center;
            transition: transform 250ms ease;
        }

        .badge-icon:hover svg {
            transform: scale(1.2) rotate(-10deg);
        }

    </style>

@endsection
