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
@include('assets.navbar')

{{-- Content --}}
<main class="pt-24 max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Nieuws</h1>

    <div class="space-y-6">
        <article class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-2">🎶 Nieuwe cover online</h2>
            <p class="text-gray-700">Ik heb net een nieuwe pianocover van Chopin’s Nocturne toegevoegd.
                Bekijk hem op mijn YouTube kanaal!</p>
            <p class="text-sm text-gray-500 mt-2">Geplaatst op 21 september 2025</p>
        </article>

        <article class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-2">📅 Optreden gepland</h2>
            <p class="text-gray-700">Volgende maand speel ik live in een lokaal café. Binnenkort deel ik meer info.</p>
            <p class="text-sm text-gray-500 mt-2">Geplaatst op 20 september 2025</p>
        </article>
    </div>
</main>

</body>
</html>
