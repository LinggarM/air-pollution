<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Add your CSS or Bootstrap links here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <!-- Navbar or other layout components -->

        <!-- Dynamic content will be injected here -->
        @yield('content')
    </div>

    <!-- Add your JS scripts here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
