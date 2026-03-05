<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | HabitForge</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 40px 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .btn {
            background: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-danger {
            background: #e74c3c;
        }

        .btn-dark {
            background: #333;
        }

        input {
            padding: 8px;
            width: 250px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
    </style>

</head>

<body>

    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

</body>

</html>
