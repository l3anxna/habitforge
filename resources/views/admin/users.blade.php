@extends('layouts.footer')

@section('title')
Manage Users
@endsection

@section('content')

<h1>Manage Users</h1>

<ul>
    @foreach($users as $user)
        <li>{{ $user }}</li>
    @endforeach
</ul>

<br>

<a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>

</body>

@endsection