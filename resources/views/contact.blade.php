{{-- Navbar --}}
@extends('layout.app')

@section('hero')
    <section
        class="relative h-[60vh] md:h-[75vh] bg-cover bg-center bg-fixed flex items-center justify-center -z-10"
        style="background-image: url('{{ asset('images/frontpiano.jpg') }}');">
        {{-- Donkere overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Hero content --}}
        <div class="relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">
                Contact
            </h1>
        </div>
    </section>
@endsection

{{-- Contact Content --}}
@section('content')
<main class="py-10">
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
@endsection
