<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akito - piano</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="bg-gray-100 text-gray-900" x-data="{ scrolled: false }"
      x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })">

<!-- Navbar -->
<nav class="fixed w-full top-0 z-50 transition-colors duration-500"
     :class="scrolled ? 'bg-white shadow-md text-gray-900' : 'bg-transparent text-white'">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        <div class="text-2xl font-bold text-white">Akito - Piano</div>
        <ul class="flex gap-6">
            <li><a href="{{ url('/') }}" class="text-white hover:text-blue-400">Home</a></li>
            <li><a href="{{ url('/news') }}" class="text-white hover:text-blue-400">News</a></li>
            <li><a href="{{ url('/about') }}" class="text-white hover:text-blue-400">About</a></li>
            <li><a href="{{ url('/contact') }}" class="text-white hover:text-blue-400">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Hero section -->
<section class="h-screen bg-[url('/images/piano.jpg')] bg-cover bg-center bg-fixed relative">
    <!-- donkere overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- content bovenop -->
    <div class="relative flex items-center justify-center h-full text-center text-white">
        <div class="p-8">
            <h1 class="text-5xl font-bold mb-4">Welcome to My Piano Blog</h1>
            <p class="text-xl">   I want to create an opportunity where you can share your interest
                and hobby 🎶</p>

            <a href="#arrow">
                <img src="{{ asset('images/heroicons-chevron-down-icon.png') }}" alt="Scroll down" class="mx-auto w-10 h-10 animate-bounce">
            </a>
        </div>
    </div>
</section>

<div id="arrow" class="pt-12">
    <p class="text-center">Hier komt je content onderaan</p>
</div>
<!-- Content -->
<main class="container mx-auto p-6 mt-6">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white shadow-inner text-center p-4 mt-6">
    <p class="text-sm text-gray-600">© 2025 PianoSite - Gemaakt met ❤️ en Laravel</p>
</footer>

</body>
</html>
