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

                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                            onsubmit="return confirm('Delete this user?')">

                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-3 py-1 rounded">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </table>

    </div>

@endsection
