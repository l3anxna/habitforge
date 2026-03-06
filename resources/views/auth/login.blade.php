@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-50">

        <div class="bg-white p-10 rounded-xl shadow w-96">

            <h2 class="text-2xl font-bold mb-6 text-center">
                Login
            </h2>

            <form method="POST" action="/login">
                @csrf

                <input type="email" name="email" placeholder="Email" class="w-full border rounded-lg px-4 py-2 mb-4">

                <input type="password" name="password" placeholder="Password"
                    class="w-full border rounded-lg px-4 py-2 mb-6">

                <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                    Login
                </button>

            </form>

        </div>

    </div>
@endsection
