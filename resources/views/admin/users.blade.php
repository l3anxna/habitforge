<html>
<head>
    <title>Manage Users</title>
</head>
<body>

<h1>Manage Users</h1>

<ul>
    @foreach($users as $user)
        <li>{{ $user }}</li>
    @endforeach
</ul>

<br>

<a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>

</body>
</html>