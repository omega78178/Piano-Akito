{{-- resources/views/sheets/edit.blade.php --}}
@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6">Sheet bewerken</h2>
        <form action="{{ route('sheets.update', $sheet->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{--Used by updates or editing --}}

            <label class="block mb-2">Titel
                <input type="text" name="title" value="{{ old('title', $sheet->title) }}" class="border rounded w-full p-2" required>
            </label>

            <label class="block mb-2">Moeilijkheid
                <input type="text" name="difficulty" value="{{ old('difficulty', $sheet->difficulty) }}" class="border rounded w-full p-2">
            </label>

            <label class="block mb-4">PDF-bestand (optioneel opnieuw uploaden)
                <input type="file" name="pdf" class="block w-full border rounded p-2">
            </label>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Opslaan</button>
            <a href="{{ route('admin.sheets.index') }}" class="ml-2 text-gray-600">Annuleren</a>
        </form>
    </div>
@endsection
