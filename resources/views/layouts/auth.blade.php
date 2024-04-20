<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') | {{ config('app.name', 'MorFlow') }}</title>
    <!-- Head -->
    @include('layouts.template-components.head')
</head>
<body class="bg-gradient-primary">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
