<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piano Website</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Navbar -->
<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="text-2xl font-bold text-blue-600">🎹 PianoSite</div>
    <ul class="flex gap-6">
        <li><a href="{{ url('/') }}" class="hover:text-blue-600">Home</a></li>
        <li><a href="{{ url('/news') }}" class="hover:text-blue-600">Nieuws</a></li>
        <li><a href="{{ url('/about') }}" class="hover:text-blue-600">Over mij</a></li>
        <li><a href="{{ url('/contact') }}" class="hover:text-blue-600">Contact</a></li>
    </ul>
</nav>

<!-- Content -->
<main class="container mx-auto p-6">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white shadow-inner text-center p-4 mt-6">
    <p class="text-sm text-gray-600">© 2025 PianoSite - Gemaakt met ❤️ en Laravel</p>
</footer>

</body>
</html>
