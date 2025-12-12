{{-- resources/views/assets/navbar.blade.php --}}
@php
    $isShowPage = request()->is('news/*');
@endphp

<nav id="main-nav"
     class="font-open-sans fixed top-0 left-0 w-full z-1 transition-colors duration-500
        {{ $isShowPage ? 'bg-black text-white shadow-md' : 'bg-transparent text-white' }}">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/LogoAkito.png') }}"
                 alt="Logo Akito"
                 class="h-18 w-auto object-contain" />
        </a>

        {{-- Desktop links --}}
        <ul class="hidden md:flex gap-6">
            <li><a href="{{ url('/') }}" class="nav-link hover:text-blue-400">HOME</a></li>
            <li><a href="{{ url('/news') }}" class="nav-link hover:text-blue-400">NEWS</a></li>
            <li><a href="{{ url('/about') }}" class="nav-link hover:text-blue-400">ABOUT</a></li>
            <li><a href="{{ url('/sheets') }}" class="nav-link hover:text-blue-400">SHEETS</a></li>
            <li><a href="{{ url('/contact') }}" class="nav-link hover:text-blue-400">CONTACT</a></li>
        </ul>

        {{-- Hamburger (alleen mobiel) --}}
        <button id="nav-toggle"
                class="md:hidden inline-flex items-center justify-center p-3 rounded  hover:bg-white/20 focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</nav>


{{-- Donkere achtergrond + slide-menu samen --}}
<div id="nav-overlay"
     class="md:hidden hidden fixed inset-0 z-[9000] bg-black/60">

    {{-- Klik op de donkere achtergrond om te sluiten --}}
    <div id="nav-backdrop" class="absolute inset-0"></div>

    {{-- 60% breed menu links --}}
    <div id="nav-menu"
         class="absolute inset-y-0 left-0 w-4/6 bg-black text-white
                flex flex-col items-start justify-start space-y-6 px-6 pt-12">

        <a href="{{ url('/') }}" class="mb-4">
            <img src="{{ asset('images/LogoAkito.png') }}"
                 alt="Logo Akito"
                 class="h-50 w-auto object-contain">
        </a>

        <a href="{{ url('/') }}" class="text-xl font-semibold hover:text-blue-400 w-full text-left">Home</a>
        <a href="{{ url('/news') }}" class="text-xl font-semibold hover:text-blue-400 w-full text-left">News</a>
        <a href="{{ url('/about') }}" class="text-xl font-semibold hover:text-blue-400 w-full text-left">About</a>
        <a href="{{ url('/sheets') }}" class="text-xl font-semibold hover:text-blue-400 w-full text-left">Sheets</a>
        <a href="{{ url('/contact') }}" class="text-xl font-semibold hover:text-blue-400 w-full text-left">Contact</a>
    </div>
</div>

{{-- Scripts --}}
@if (! $isShowPage)
    <script>
        const nav      = document.getElementById('main-nav');
        const navToggle = document.getElementById('nav-toggle');
        const navOverlay = document.getElementById('nav-overlay');

        // Scroll: alleen kleur/schaduw
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                nav.classList.add('bg-black', 'shadow-md');
                nav.classList.remove('bg-transparent');
            } else {
                nav.classList.remove('bg-black', 'shadow-md');
                nav.classList.add('bg-transparent');
            }
        });

        // Mobile menu + donkere achtergrond toggle
        if (navToggle && navOverlay) {
            navToggle.addEventListener('click', () => {
                navOverlay.classList.toggle('hidden');
            });

            // Klik op links: sluiten
            navOverlay.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    navOverlay.classList.add('hidden');
                });
            });

            // Klik op donkere achtergrond: sluiten
            const backdrop = document.getElementById('nav-backdrop');
            if (backdrop) {
                backdrop.addEventListener('click', () => {
                    navOverlay.classList.add('hidden');
                });
            }
        }
    </script>
@endif
