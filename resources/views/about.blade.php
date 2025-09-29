<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws - PianoSite</title>
    @vite('resources/css/app.css') {{-- Tailwind laden --}}
</head>
<body class="bg-gray-100 text-gray-900">

{{-- Navbar --}}
<nav class="fixed w-full top-0 z-50 bg-gray-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        <div class="text-2xl font-bold">Akito - Piano</div>
        <ul class="flex gap-6">
            <li><a href="{{ url('/') }}" class="text-white hover:text-blue-400">Home</a></li>
            <li><a href="{{ url('/news') }}" class="text-white hover:text-blue-400">News</a></li>
            <li><a href="{{ url('/about') }}" class="text-white hover:text-blue-400">About</a></li>
            <li><a href="{{ url('/contact') }}" class="text-white hover:text-blue-400">Contact</a></li>
        </ul>
    </div>
</nav>

{{-- Content --}}
<main class="pt-24 max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">About</h1>
</main>

</body>
</html>
