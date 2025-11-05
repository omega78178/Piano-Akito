@extends('layout.app')

@section('hero')
    <section class="relative h-[60vh] bg-[url('/public/images/Omega.jpg')] bg-cover bg-center bg-fixed flex items-center justify-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">About Me</h1>
            <p class="text-white text-lg md:text-2xl opacity-80 max-w-xl mx-auto">
                Leer meer over mijn passie voor piano, muziek en web development!
            </p>
        </div>
    </section>
@endsection

@section('content')
    <main class="pt-20 max-w-3xl mx-auto p-6">
        <div class="flex flex-col md:flex-row items-center gap-10">
            <!-- Afbeelding -->
            <img src="{{ asset('images/Omega.jpg') }}"
                 alt="Akito profile photo"
                 class="w-52 h-52 object-cover rounded-full shadow-lg border-4 border-blue-200 mb-8 md:mb-0">

            <!-- Persoonlijke tekst -->
            <div class="flex-1">
                <p class="text-lg text-gray-700 mb-6">
                    Hi! I’m Akito — a passionate piano player and web developer.
                    My musical journey started when I was still a kid: I’ve played covers from all sorts of anime and games, like
                    <span class="font-semibold">Final Fantasy</span>,
                    <span class="font-semibold">Naruto</span> and
                    <span class="font-semibold">Attack on Titan</span>.
                    Piano is not just a hobby, it’s where I can let emotion and creativity flow.
                </p>
                <p class="text-md text-gray-600 mb-6">
                    Besides the keys, I love building and designing websites – especially with Laravel and Tailwind CSS.
                    I enjoy making custom projects, like this one, that help unite people who share a passion for music or technology.
                </p>
                <p class="text-md text-gray-600 mb-6">
                    I’m always learning: whether it's debugging code, discovering new piano soundtracks, or tweaking my site’s design.
                    On this blog, you’ll find updates about my musical journey, tips for beginners, and site features I’m proud of.
                    Feel free to reach out or share your own music!
                </p>
                <a href="mailto:{{ config('mail.from.address') }}"
                   class="inline-block mt-4 px-6 py-2 bg-blue-700 text-white rounded hover:bg-blue-900 shadow transition">
                    Contact me
                </a>
            </div>
        </div>
    </main>
@endsection
