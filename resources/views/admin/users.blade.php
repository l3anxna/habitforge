@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

    <h1 class="text-2xl font-bold mb-6">Manage Users</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <table width="100%" cellpadding="10">

            <tr style="text-align:left;">
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>

            @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        {{ ucfirst($user->role) }}
                    </td>

                    <td>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                onsubmit="return confirm('Delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded flex items-center gap-2"
                                    title="Delete User">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    Delete
                                </button>
                            </form>

                            <form method="POST" action="{{ route('admin.users.role', $user->id) }}"
                                style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button class="px-3 py-1 rounded flex items-center gap-2 text-white"
                                    style="background-color: {{ $user->role === 'admin' ? '#f59e0b' : '#3b82f6' }};"
                                    title="{{ $user->role === 'admin' ? 'Demote User' : 'Promote User' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="{{ $user->role === 'admin' ? 'M10 2a.75.75 0 0 1 .75.75v12.59l1.95-2.1a.75.75 0 1 1 1.1 1.02l-3.25 3.5a.75.75 0 0 1-1.1 0l-3.25-3.5a.75.75 0 1 1 1.1-1.02l1.95 2.1V2.75A.75.75 0 0 1 10 2Z' : 'M10 18a.75.75 0 0 1-.75-.75V4.66L7.3 6.76a.75.75 0 0 1-1.1-1.02l3.25-3.5a.75.75 0 0 1 1.1 0l3.25 3.5a.75.75 0 1 1-1.1 1.02l-1.95-2.1v12.59A.75.75 0 0 1 10 18Z' }}" />
                                    </svg>

                                    {{ $user->role === 'admin' ? 'Demote' : 'Promote' }}
                                </button>
                            </form>

                            <form>
                                <a href="{{ route('admin.users.habits', $user->id) }}"
                                    class="bg-gray-500 text-white px-3 py-1 rounded">
                                    Details
                                </a>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach

        </table>

    </div>

@endsection
