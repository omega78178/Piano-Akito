@php use Illuminate\Support\Carbon; @endphp
    <!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws - PianoSite</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

{{-- Navbar --}}
@include('assets.navbar')

{{-- Content --}}
<main class="pt-24 max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Nieuws</h1>

    <div class="space-y-6">
        @foreach($news as $post)
            <article class="bg-white p-6 rounded-lg shadow">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                         class="mb-4 rounded-lg w-full max-h-80 object-cover">
                @endif
                <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                <p class="text-gray-700">{{ $post->body }}</p>
                <p class="text-sm text-gray-500 mt-2">Geplaatst
                    op {{ Carbon::parse($post->publish_date)->format('d F Y') }}</p>
            </article>
        @endforeach
    </div>
</main>

<div class="">
    @include('assets.footer')
</div>

</body>
</html>
