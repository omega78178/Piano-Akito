@extends('layout')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold mb-6">Nieuws toevoegen</h1>

    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow flex flex-col gap-4 max-w-2xl mx-auto">
        @csrf

        <label class="flex flex-col">
            <span class="font-semibold mb-1">Titel</span>
            <input type="text" name="title" placeholder="Titel" required class="border rounded p-2"
                   value="{{ old('title') }}">
        </label>

        <label class="flex flex-col">
            <span class="font-semibold mb-1">Bericht</span>
            <textarea name="body" placeholder="Bericht" required
                      class="border rounded p-2 h-36">{{ old('body') }}</textarea>
        </label>

        <label class="flex flex-col">
            <span class="font-semibold mb-1">Publicatiedatum</span>
            <input type="date" name="publish_date" class="border rounded p-2"
                   value="{{ old('publish_date') }}">
        </label>

        <label class="flex flex-col">
            <span class="font-semibold mb-1">Afbeelding</span>
            <input type="file" name="image" accept="image/*" class="border rounded p-2">
        </label>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded w-fit">
            Opslaan
        </button>
    </form>
@endsection
