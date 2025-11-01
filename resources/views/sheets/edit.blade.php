@extends('layout.app')

@section('title', 'Sheet bewerken')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-8 max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Sheet bewerken</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="pl-4">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sheets.update', $sheet->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block font-semibold mb-1">Titel</label>
                <input type="text" name="title" id="title" value="{{ old('title', $sheet->title) }}" required
                       class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="difficulty" class="block font-semibold mb-1">Moeilijkheidsgraad</label>
                <select name="difficulty" id="difficulty" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200" required>
                    <option value="">Selecteer...</option>
                    <option value="Beginner" {{ old('difficulty', $sheet->difficulty) == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ old('difficulty', $sheet->difficulty) == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Advanced" {{ old('difficulty', $sheet->difficulty) == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>

            <div>
                <label for="pdf" class="block font-semibold mb-1">PDF bestand (optioneel)</label>
                <input type="file" name="pdf" id="pdf" accept=".pdf"
                       class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200">
                @if ($sheet->pdf)
                    <div class="mt-2">
                        <a href="{{ asset('storage/' . $sheet->pdf) }}" target="_blank" class="text-blue-700 underline">Huidige PDF bekijken</a>
                    </div>
                @endif
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('sheets.index') }}" class="btn btn-gray">Annuleren</a>
                <button type="submit" class="btn btn-indigo font-semibold">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
@endsection
