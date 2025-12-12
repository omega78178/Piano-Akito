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
            <h1 class="text-4xl md:text-5xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg">
                Contact
            </h1>
        </div>
    </section>
@endsection

{{-- Contact Content --}}
@section('content')
    <main id="contact" class="py-10">

        {{-- Succes-melding --}}
        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-6 flex items-start gap-3 rounded-lg bg-green-100 border border-green-300 text-green-900 px-4 py-3 text-sm md:text-base">
                <span class="mt-0.5 font-bold">✓</span>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <p class="text-center text-lg max-w-2xl mx-auto py-8">
            Have a question or just want to chat? Feel free to reach out! I’d love to hear from you.
            Whether it’s about sheet music, collaborations, or anything else, I’m happy to help!
        </p>

        <form action="/contact" method="POST" class="max-w-2xl mx-auto space-y-4" novalidate>
            @csrf

            <div>
                <label for="fname" class="block text-left font-medium">Name*</label>
                <input
                    type="text"
                    id="fname"
                    name="fname"
                    value="{{ old('fname') }}"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('fname') border-red-500 @enderror"
                >
                @error('fname')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-left font-medium">Email*</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('email') border-red-500 @enderror"
                >
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-left font-medium">Comments*</label>
                <textarea
                    name="message"
                    id="message"
                    rows="6"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('message') border-red-500 @enderror"
                >{{ old('message') }}</textarea>
                @error('message')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input
                    type="submit"
                    value="Submit"
                    class="bg-black text-white px-6 py-2 rounded hover:bg-blue-800 transition cursor-pointer"
                >
            </div>
        </form>
    </main>
@endsection
