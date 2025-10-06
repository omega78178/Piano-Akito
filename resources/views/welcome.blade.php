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
<nav class="fixed w-full top-0 z-50 bg-black = window.scrollY > 50)"
     :class="scrolled ? 'bg-black/90 shadow-md text-white' : 'bg-transparent text-white'">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        <div class="text-2xl font-bold text-white">Akito - Piano</div>
        <ul class="flex gap-6">
            <li><a href="{{ url('/') }}" class="text-white hover:text-blue-400">Home</a></li>
            <li><a href="{{ url('/news') }}" class="text-white hover:text-blue-400">News</a></li>
            <li><a href="{{ url('/about') }}" class="text-white hover:text-blue-400">About</a></li>
            <li><a href="{{ url('/contact') }}" class="text-white hover:text-blue-400">Contact</a></li>
            <li><a href="{{ url('/sheets') }}" class="text-white hover:text-blue-400">Sheets</a></li>
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
<section id="about-akito" class="bg-[linear-gradient(180deg,#3a3a3a_11%,#f2f2f2_230%)]
 py-60 px-20 ">
    <div class="max-w-6xl mx-auto md:flex md:flex-row-reverse gap-12 items-center md:right-12">

        <!-- Tekstgedeelte -->
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-6">
                About Akito
            </h1>
            <p class="text-white leading-relaxed mb-8">
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

<div class="text-center py-20 bg-[linear-gradient(180deg,#f3e6cf_0%,#fff8e7_100%)] border-t border-[#e6d8b8]/30">
    <div class="Sheet-link mb-8">
        <h1 class="text-4xl font-bold mb-6 text-gray-800">Sheets</h1>

        <img src="{{ asset('images/Sheets.png') }}"
             alt="Sheet Music"
             class="w-full max-w-3xl mx-auto rounded-xl shadow-lg mb-6">
    </div>

    <div class="Sheet-text max-w-3xl mx-auto text-left">
        <p class="max-w-3xl mx-auto text-gray-700 mb-8 text-lg">
            Explore my collection of sheet music! Feel free to use these sheets for your practice,
            performances, or personal enjoyment. Whether you're a beginner or an advanced musician,
            I hope you find something inspiring here.
        </p>

        <a href="{{ url('/sheets') }}"
           class="inline-block bg-black text-white font-semibold text-lg py-3 px-6 rounded-lg transition duration-300 hover:bg-white hover:text-black hover:underline shadow-md">
            Explore Sheets
        </a>
    </div>
</div>


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
