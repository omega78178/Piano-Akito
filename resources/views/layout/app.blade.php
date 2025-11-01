<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PianoSite')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
@include('assets.navbar')
@yield('hero')
<main class="pt-24 max-w-4xl mx-auto p-6">
    @yield('content')
</main>
@include('assets.footer')
</body>
</html>
