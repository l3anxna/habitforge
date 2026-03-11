@extends('layouts.app')

@section('title')
    About Us
@endsection

@section('content')
    <div class="bg-slate-50 text-slate-900 py-16">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h1 class="text-4xl lg:text-5xl font-extrabold mb-4">About HabitForge</h1>
                    <p class="text-lg mb-6">We help people build small, sustainable habits that compound into meaningful change. Simple daily check-ins, helpful insights, and a privacy-first approach — designed to support momentum, not pressure.</p>

                    <p class="text-sm mb-6">Founded with the belief that consistency beats intensity, HabitForge focuses on frictionless tools and calm design so habits stick.</p>

                    <div class="flex gap-3">
                        <a href="/register" class="inline-flex items-center bg-indigo-600 text-white px-5 py-3 rounded-xl font-semibold shadow hover:scale-105 transform transition">Get started — it's free</a>
                        <a href="/" class="inline-flex items-center border border-slate-200 px-5 py-3 rounded-xl hover:bg-slate-100 transition">Back to home</a>
                    </div>
                </div>

                <div class="flex justify-center lg:justify-end">
                    <img src="/images/habitforge-hero.png" alt="HabitForge overview" class="w-72 lg:w-96 rounded-2xl shadow px-2 bg-white">
                </div>
            </div>

            <!-- Features -->
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl text-center shadow-sm border border-slate-100">
                    <h3 class="font-semibold mb-2 text-indigo-700">Simple Check-ins</h3>
                    <p class="text-sm text-slate-700">One-tap progress tracking so you can keep momentum without friction.</p>
                </div>

                <div class="bg-white p-6 rounded-xl text-center shadow-sm border border-slate-100">
                    <h3 class="font-semibold mb-2 text-indigo-700">Private by design</h3>
                    <p class="text-sm text-slate-700">Your data stays yours — no public leaderboards, no unnecessary sharing.</p>
                </div>

                <div class="bg-white p-6 rounded-xl text-center shadow-sm border border-slate-100">
                    <h3 class="font-semibold mb-2 text-indigo-700">Gentle reminders</h3>
                    <p class="text-sm text-slate-700">Optional nudges that encourage consistency without nagging.</p>
                </div>
            </div>

            <!-- Team & values -->
            <div class="mt-12 bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-2xl font-semibold mb-4">Our approach</h3>
                <p class="mb-4 text-slate-700">We focus on human-centered design: clear, calm interfaces and features that respect your time and attention. Small wins add up — our job is to make them easy to capture.</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <div class="font-semibold">Mission</div>
                        <div class="text-sm text-slate-600">Help people turn intention into routine.</div>
                    </div>

                    <div>
                        <div class="font-semibold">Privacy</div>
                        <div class="text-sm text-slate-600">Minimal data collection, clear choices, local-first where possible.</div>
                    </div>

                    <div>
                        <div class="font-semibold">Simplicity</div>
                        <div class="text-sm text-slate-600">Features that remove friction, not add it.</div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-12 text-center">
                <h4 class="text-xl font-semibold mb-3">Ready to build a habit you keep?</h4>
                <p class="mb-6 opacity-90">Start with one small action today and let momentum do the rest.</p>
                <a href="/register" class="inline-flex items-center bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold shadow hover:scale-105 transform transition">Create account</a>
            </div>
        </div>
    </div>
@endsection
