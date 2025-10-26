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

<main class="pt-24 max-w-4xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Nieuws</h1>
        <form action="{{ route('news.create') }}" method="GET">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Nieuw bericht toevoegen
            </button>
        </form>
    </div>

    <div class="space-y-6">
        @foreach($news as $post)
            <article class="bg-white p-6 rounded-lg shadow">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                         class="mb-4 rounded-lg w-full max-h-80 object-cover">
                @endif

                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('news.show', $post->id) }}" class="text-black ">
                        {{ Str::limit($post->title, 60, '...') }}
                    </a>
                </h2>
                    <div class="text-gray-800 leading-relaxed">
                        {{ Str::limit($post->body ?? 'Nog geen inhoud beschikbaar.', 20, '...') }}
                    </div>

                <!-- Hier komt jouw verwijderen-knop -->
                <form action="{{ route('news.destroy', $post->id) }}" method="POST"
                      onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')"
                      class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                        Verwijderen
                    </button>
                </form>
            </article>
        @endforeach

    </div>
</main>

@include('assets.footer')
</body>
</html>
