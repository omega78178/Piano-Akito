<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<nav class="bg-blue-800 text-white px-6 py-4 flex gap-4">
    <a href="{{ route('admin.dashboard') }}" class="font-bold">Admin</a>
    <a href="{{ route('admin.news.index') }}">Nieuws beheren</a>
    <a href="{{ route('admin.sheets.index') }}">Sheets beheren</a>
    <a href="{{ url('/') }}" class="ml-auto underline">Terug naar site</a>
</nav>
<div class="max-w-6xl mx-auto py-10">
    @yield('content')
</div>
</body>
</html>
