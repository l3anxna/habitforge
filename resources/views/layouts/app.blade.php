<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | HabitForge</title>
</head>

<body>

@include('partials.navbar')

<hr>

<div class="container">
    @yield('content')
</div>

@include('partials.footer')

</body>
</html>