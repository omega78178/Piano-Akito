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
    <h1 class="text-3xl font-bold mb-6">Akito's library</h1>
</main>

<div>
    @include('assets.footer')
</div>

</body>
</html>
<?php
