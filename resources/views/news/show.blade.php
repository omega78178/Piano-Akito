@php use Illuminate\Support\Carbon; @endphp
@extends('layout.app')

@section('content')
    <main class="pt-24 max-w-4xl mx-auto p-6">
        <article class="bg-white p-6 rounded-lg shadow">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                     class="mb-4 rounded-lg w-full max-h-96 object-cover">
            @endif

            <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
            <p class="text-gray-500 mb-4">
                Geplaatst op {{ Carbon::parse($post->publish_date)->format('d F Y') }}
            </p>
            <div class="text-gray-800 leading-relaxed">{{ $post->body }}</div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('news.index') }}" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">← Terug naar
                    overzicht</a>
            </div>
        </article>
    </main>
@endsection
