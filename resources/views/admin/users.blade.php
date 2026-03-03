@extends('layouts.app')

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

@endsection