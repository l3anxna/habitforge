@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-indigo-800 to-slate-800 text-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-20 lg:py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">
                        Build Better Habits — one day at a time
                    </h1>

                    <p class="text-lg lg:text-xl mb-8 opacity-90">
                        Turn small actions into lasting routines. Track check-ins, build streaks,
                        celebrate wins, and get gentle nudges to keep you going.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="/register"
                           class="inline-flex items-center justify-center bg-slate-100/90 text-slate-900 px-6 py-3 rounded-xl font-semibold shadow hover:scale-105 transform transition">
                            Start Building Habits
                        </a>

                        <a href="/about"
                           class="inline-flex items-center justify-center border border-white/20 px-6 py-3 rounded-xl hover:bg-slate-700/30 transition">
                            Learn More
                        </a>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-6 text-sm opacity-90 justify-center lg:justify-start">
                        <div class="flex items-center gap-3">
                            <span class="bg-slate-700/40 px-3 py-2 rounded-full font-medium">Free to start</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="bg-slate-700/40 px-3 py-2 rounded-full font-medium">Privacy-first</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="bg-slate-700/40 px-3 py-2 rounded-full font-medium">Built for momentum</span>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="mt-10 grid grid-cols-3 gap-4 max-w-sm lg:max-w-none mx-auto lg:mx-0 text-center lg:text-left">
                        <div>
                            <div class="text-2xl font-bold">12k+</div>
                            <div class="text-xs opacity-80">Active users</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold">48k</div>
                            <div class="text-xs opacity-80">Checkins tracked</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold">7</div>
                            <div class="text-xs opacity-80">Average streak (days)</div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center lg:justify-end">
                    <img src="/images/habitforge-hero.png" alt="Habit Forge overview" class="w-80 lg:w-[520px] rounded-2xl shadow-2xl">
                </div>
            </div>

            <!-- Features -->
            <div class="mt-16 bg-slate-800/60 rounded-2xl p-6 lg:p-10">
                <h2 class="text-2xl font-bold mb-6 text-center lg:text-left">What you can do</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="bg-slate-700/40 p-6 rounded-xl text-center">
                        <div class="mb-4 flex items-center justify-center">
                            <!-- calendar icon -->
                            <svg class="w-10 h-10 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3M16 7V3M3 11h18M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"></path></svg>
                        </div>
                        <h3 class="font-semibold mb-2">Daily Check-ins</h3>
                        <p class="text-sm opacity-90">Mark progress and keep your streaks going with a single tap.</p>
                    </div>

                    <div class="bg-slate-700/40 p-6 rounded-xl text-center">
                        <div class="mb-4 flex items-center justify-center">
                            <!-- chart icon -->
                            <svg class="w-10 h-10 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 17l-3-3a1 1 0 00-1.414 0L4 16M21 7l-5 5-4-4-6 6"></path></svg>
                        </div>
                        <h3 class="font-semibold mb-2">Progress & Insights</h3>
                        <p class="text-sm opacity-90">Understand patterns, celebrate streaks, and spot opportunities to improve.</p>
                    </div>

                    <div class="bg-slate-700/40 p-6 rounded-xl text-center">
                        <div class="mb-4 flex items-center justify-center">
                            <!-- bell icon -->
                            <svg class="w-10 h-10 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V4a1 1 0 10-2 0v1.083A6 6 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h11z"></path></svg>
                        </div>
                        <h3 class="font-semibold mb-2">Gentle Reminders</h3>
                        <p class="text-sm opacity-90">Optional nudges to help you stay consistent without pressure.</p>
                    </div>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-slate-700/40 p-6 rounded-xl">
                    <p class="italic">"Habit Forge made it easy to turn small wins into a lasting routine. I finally built a morning habit I keep coming back to."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center font-semibold">AM</div>
                        <div>
                            <div class="font-semibold">Alex M.</div>
                            <div class="text-xs opacity-80">Designer, 92-day streak</div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-700/40 p-6 rounded-xl">
                    <p class="italic">"Simple, calming, and private. The streaks keep me motivated more than anything else."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center font-semibold">SJ</div>
                        <div>
                            <div class="font-semibold">Sam J.</div>
                            <div class="text-xs opacity-80">Student, 37-day streak</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Final CTA -->
            <div class="mt-12 text-center">
                <h3 class="text-2xl font-bold mb-4">Ready to start your streak?</h3>
                <p class="mb-6 opacity-90">Join thousands of people building better habits — it only takes one check-in.</p>
                <div class="flex justify-center gap-4">
                    <a href="/register" class="bg-slate-100/90 text-slate-900 px-6 py-3 rounded-xl font-semibold shadow hover:scale-105 transform transition">Create account</a>
                    <a href="/about" class="border border-white/20 px-6 py-3 rounded-xl hover:bg-slate-700/30">See how it works</a>
                </div>
            </div>
        </div>
    </div>
@endsection
