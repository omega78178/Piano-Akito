{{-- resources/views/news/edit.blade.php --}}
@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Nieuwsbericht bewerken</h2>
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label class="block mb-2">Titel
                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="border rounded w-full p-2" required>
            </label>

            <label class="block mb-4">Inhoud
                <textarea name="body" rows="8" class="border rounded w-full p-2" required>{{ old('body', $news->body) }}</textarea>
            </label>

            <label class="block mb-4">Huidige afbeelding:
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Nieuwsafbeelding" class="w-40 mb-2">
                @else
                    <span class="italic text-gray-500">Geen afbeelding</span>
                @endif
            </label>

            <label class="block mb-4">Nieuwe afbeelding
                <input type="file" name="image" class="block w-full border rounded p-2">
            </label>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Opslaan</button>
            <a href="{{ route('admin.news.index') }}" class="ml-2 text-gray-600">Annuleren</a>
        </form>
    </div>
@endsection
