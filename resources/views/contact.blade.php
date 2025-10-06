<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws - PianoSite</title>
    @vite('resources/css/app.css') {{-- Tailwind laden --}}
</head>
<body class="bg-gray-400 text-gray-900">

{{-- Navbar --}}
<nav class="fixed w-full top-0 z-50 bg-gray-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        <div class="text-2xl font-bold">Akito - Piano</div>
        <ul class="flex gap-6">
            <li><a href="{{ url('/') }}" class="text-white hover:text-blue-400">Home</a></li>
            <li><a href="{{ url('/news') }}" class="text-white hover:text-blue-400">News</a></li>
            <li><a href="{{ url('/about') }}" class="text-white hover:text-blue-400">About</a></li>
            <li><a href="{{ url('/contact') }}" class="text-white hover:text-blue-400">Contact</a></li>
            <li><a href="{{ url('/contact') }}" class="text-white hover:text-blue-400">Sheets</a></li>
        </ul>
    </div>
</nav>

<section class="pt-24 max-w-4xl mx-auto p-6">
    <h1 class="text-center text-3xl font-bold mb-6">Contact</h1>
    <p class="text-center text-xl">Have a question or just want to chat? Feel free to reach out! I’d love to hear from you.
        Whether it’s about sheet music, collaborations, or anything else, I’m happy to help!</p>
</section>

{{-- Contact Content --}}
<main class="py-10">
    <form class="max-w-2xl mx-auto space-y-4">
        <div>
            <label for="fname" class="block text-left font-medium" >Name*</label>
            <input type="text" id="fname" name="fname" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="lname" class="block text-left font-medium">Email*</label>
            <input type="text" id="lname" name="lname" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="message" class="block text-left font-medium">Comments*</label>
            <textarea name="message" id="message" rows="6" class="w-full border border-gray-300 rounded px-3 py-2">The cat was playing in the garden.</textarea>
        </div>

        <div>
            <input type="submit" value="Submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition">
        </div>
    </form>
</main>

<div class="flex flex-col items-center md:items-start">
    @include('assets.socials')
</div>

</body>
</html>
