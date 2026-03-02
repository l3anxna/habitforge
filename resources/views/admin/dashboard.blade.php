<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Admin Dashboard</h1>

<p>Total Users: {{ $totalUsers }}</p>
<p>Total Habits: {{ $totalHabits }}</p>

<br>

<a href="{{ route('admin.users') }}">Manage Users</a>

</body>
</html>