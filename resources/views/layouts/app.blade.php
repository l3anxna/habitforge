<html>
<head>
    <title>@yield('title')</title>
</head>
<body>

    @include('partials.navbar')

    <hr>

    <div>
        @yield('content')
    </div>

    @include('partials.footer')

</body>
</html>