@extends('layout.app')

@section('hero')
    <section
        class="relative h-[60vh] bg-[url('/public/images/Omega.jpg')] bg-cover bg-center bg-fixed flex items-center justify-center -z-10">
        {{-- Donkere overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>

        {{-- Hero content --}}
        <div class="relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">
                About Me
            </h1>
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
                    Hi! I’m Akito — a piano player who loves performing anime music, and currently studying for my bachelor of ICT.
                    I first started playing piano when I was 14. I’ve played covers of anime and games, such as
                    <span class="font-semibold">Final Fantasy</span>,
                    <span class="font-semibold">Naruto</span> and
                    <span class="font-semibold">Attack on Titan</span>.
                    Piano is my hobby and it is also my way of expressing my emotions.
                </p>
                <p class="text-md text-gray-600 mb-6"> Besides playing the piano, this is the website where I will share my sheet music arrangements in the future,
                    tips for pianists who want to play anime music, game soundtracks,
                    and maybe even K-pop in the future — who knows. You’ll also find updates on my musical journey. It’s the website I’m most proud of. </p>
                <p class="text-md text-gray-600 mb-6">
                    If you have any questions, requests, or suggestions for improving, please don't hesitate to contact me.
                    Feel free to reach out or share your own music!
                </p>
                <a href="{{ url('contact') }}"
                   class="inline-block mt-4 px-6 py-2 bg-blue-700 text-white rounded hover:bg-blue-900 shadow transition">
                    Contact me
                </a>
            </div>
        </div>
    </main>
@endsection
