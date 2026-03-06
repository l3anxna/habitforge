<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <div class="flex items-center gap-8">

            <a href="/" class="text-2xl font-bold text-indigo-600">
                🔥 HabitForge
            </a>

            @auth

                @if(auth()->user()->isAdmin())

                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-indigo-600 font-medium">
                        Admin Dashboard
                    </a>

                    <a href="{{ route('admin.users') }}" class="text-gray-600 hover:text-indigo-600 font-medium">
                        Manage Users
                    </a>

                @else

                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-indigo-600 font-medium">
                        Dashboard
                    </a>

                    <a href="{{ route('habits.index') }}" class="text-gray-600 hover:text-indigo-600 font-medium">
                        My Habits
                    </a>

                @endif

            @endauth

        </div>

        <div class="flex items-center gap-4">

            @guest

                <a href="/login" class="px-4 py-2 text-gray-600 hover:text-indigo-600 font-medium">
                    Login
                </a>

                <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Register
                </a>

            @endguest


            @auth

                <span class="text-gray-600">
                    👋 {{ auth()->user()->name }}
                </span>

                <form method="POST" action="/logout">
                    @csrf
                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>

            @endauth

        </div>

    </div>
</nav>