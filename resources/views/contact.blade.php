<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws - PianoSite</title>
    @vite('resources/css/app.css') {{-- Tailwind laden --}}
</head>
<body class="bg-white text-gray-900">

{{-- Navbar --}}
@include('assets.navbar')

<section class="relative h-[75vh] bg-[url('/public/images/frontpiano.jpg')] bg-cover bg-center bg-fixed max-w-8xl mx-auto p-64">
    <!-- Donkere overlay alleen over de achtergrond -->
    <div class="absolute inset-0 bg-black/60 pointer-events-none"></div>
    <!-- Content bovenop de overlay -->
    <div class="relative">
        <h1 class="text-center text-3xl font-bold mb-6 text-white">Contact</h1>
    </div>
</section>

{{-- Contact Content --}}
<main class="py-10 bg-gray-400">
    <p class="text-center text-lg max-w-2xl mx-auto py-8">
        Have a question or just want to chat? Feel free to reach out! I’d love to hear from you.
        Whether it’s about sheet music, collaborations, or anything else, I’m happy to help!
    </p>

    <form action="/contact" method="POST" class="max-w-2xl mx-auto space-y-4">
        @csrf
        <div>
            <label for="fname" class="block text-left font-medium" >Name*</label>
            <input type="text" id="fname" name="fname" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="email" class="block text-left font-medium">Email*</label>
            <input type="text" id="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="message" class="block text-left font-medium">Comments*</label>
            <textarea name="message" id="message" rows="6" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
        </div>

        <div>
            <input type="submit" value="Submit" class="bg-black text-white px-6 py-2 rounded hover:bg-blue-800 transition cursor-pointer">
        </div>
    </form>
</main>

<div>
    @include('assets.footer')
</div>

</body>
</html>
