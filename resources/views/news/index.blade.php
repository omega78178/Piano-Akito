@php
use Illuminate\Support\Str; @endphp
    <!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws - PianoSite</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
@include('assets.navbar')

<!-- Hero section -->
<section class="relative h-[75vh] bg-[url('/public/images/nieuws.jpg')] bg-cover bg-center bg-fixed max-w-8xl mx-auto p-100">
    <!-- Donkere overlay alleen over de achtergrond -->
    <div class="absolute inset-0 bg-black/60 pointer-events-none"></div>
    <!-- Content bovenop de overlay -->
    <div class="relative">
        <h1 class="text-center text-3xl font-bold mb-6 text-white">News</h1>
    </div>
</section>

<main class="pt-24 max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-12">

        <form action="{{ route('news.create') }}" method="GET">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Nieuw bericht toevoegen
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($news as $post)
            <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition group overflow-hidden flex flex-col">
                @if($post->image)
                    <div class="overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                             class="w-full h-48 object-cover rounded-t-xl group-hover:scale-105 transition" />
                    </div>
                @endif

                <div class="p-6 flex flex-col flex-1 h-full">
                    <h2 class="font-bold text-lg text-blue-900 mb-2 group-hover:text-blue-700 transition">
                        <a href="{{ route('news.show', $post->id) }}" class="hover:underline">
                            {{ \Illuminate\Support\Str::limit($post->title, 60, '...') }}
                        </a>
                    </h2>
                    <div class="text-gray-600 leading-relaxed mb-3">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body ?? 'Nog geen inhoud beschikbaar.'), 120, '...') }}
                    </div>
                    <div class="flex items-center justify-between mt-auto pt-2">
                    <span class="text-xs text-gray-400 font-mono">
                        @if($post->publish_date)
                            Geplaatst op {{ \Illuminate\Support\Carbon::parse($post->publish_date)->format('d F Y') }}
                        @endif
                    </span>
                        <form action="{{ route('news.destroy', $post->id) }}" method="POST"
                              onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow transition text-xs font-semibold">
                                Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

</main>

@include('assets.footer')
</body>
</html>
