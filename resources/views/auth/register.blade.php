@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">

        <div class="bg-white shadow-lg rounded-xl p-10 w-full max-w-md">

            <h2 class="text-2xl font-bold text-center mb-6">
                Create your HabitForge account
            </h2>

            <p class="text-gray-500 text-center mb-6">
                Start building better habits today 🔥
            </p>

            {{-- Success message --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif


            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Name
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Password --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>

                    <input type="password" name="password" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Confirm Password --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm Password
                    </label>

                    <input type="password" name="password_confirmation" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>


                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                    Register
                </button>

            </form>


            {{-- Login link --}}
            <p class="text-center text-sm text-gray-500 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">
                    Login here
                </a>
            </p>

        </div>

    </div>
@endsection
