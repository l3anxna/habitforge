@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

    <h1>Manage Users</h1>

    <div class="card">

        <table width="100%" cellpadding="10">

            <tr style="text-align:left;">
                <th>Name</th>
                <th>Email</th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach

        </table>

    </div>

@endsection
