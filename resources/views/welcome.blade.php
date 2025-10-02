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
<section class="h-screen bg-[url('/public/images/piano.jpg')] bg-cover bg-center bg-fixed relative">
    <!-- donkere overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- content bovenop -->
    <div class="relative flex items-center justify-center h-full text-center text-white">
        <div class="p-8">
            <h1 class="text-5xl font-bold mb-4">Welcome to My Piano Blog</h1>
            <p class="text-xl">   I want to create an opportunity where you can share your interest
                and hobby 🎶</p>

            <a href="#arrow" class="block mt-8">
                <!-- Zet arrow.png in public/images/arrow.png -->
                <img src="{{ asset('images/arrow.png') }}"
                     alt="Scroll"
                     class="mx-auto w-14 h-14 object-contain animate-bounce"
                     loading="lazy">

            </a>
        </div>
    </div>
</section>

<!-- About Omega Section -->
<section id="about-omega" class="relative bg-gradient-to-b from-gray-400 to-gray-500 py-60 px-20 ">
    <div class="max-w-6xl mx-auto md:flex md:flex-row-reverse gap-12 items-center md:right-12">

    <!-- Tekstgedeelte -->
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                About Akito
            </h1>
            <p class="text-gray-700 leading-relaxed mb-8">
                Akito has played many piano covers, especially from anime and video
                games, bringing their unique interpretation and emotion into each
                performance. Their repertoire includes iconic pieces from series
                like <span class="font-semibold">Attack on Titan</span>,
                <span class="font-semibold">Naruto</span>, and
                <span class="font-semibold">Final Fantasy</span>, captivating
                audiences with a blend of technical mastery and heartfelt
                expression. Beyond covers, Akito also explores original compositions
                and creative arrangements, continuously refining their musical
                style.
            </p>
            <a href="{{ url('/about') }}"
               class="inline-block px-6 py-3 bg-black text-white font-medium rounded-xl shadow-md hover:bg-blue-800 transition">
                Find Out More
            </a>
        </div>

        <!-- Socials include -->
        <div class="flex flex-col items-center md:items-start">
            @include('assets.socials')
        </div>

        <!-- Afbeelding -->
        <div class="flex justify-center">
            <img src="{{ asset('images/Omega.jpg') }}"
                 alt="Omega"
                 class="w-300 h-72 rounded-full border-4 border-white shadow-lg object-cover">
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
