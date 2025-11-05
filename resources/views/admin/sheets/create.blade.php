@extends('layout')

@section('title', 'Sheet toevoegen')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-8 max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Nieuwe sheet toevoegen</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="pl-4">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sheets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block font-semibold mb-1">Titel</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200">
            </div>

            <div>
                <label for="difficulty" class="block font-semibold mb-1">Moeilijkheidsgraad</label>
                <select name="difficulty" id="difficulty" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200" required>
                    <option value="">Selecteer...</option>
                    <option value="Beginner" {{ old('difficulty') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ old('difficulty') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Advanced" {{ old('difficulty') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>

            <div>
                <label for="pdf" class="block font-semibold mb-1">PDF bestand</label>
                <input type="file" name="pdf" id="pdf" accept=".pdf"
                       class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.sheets.index') }}" class="btn btn-gray">Annuleren</a>
                <button type="submit" class="btn btn-indigo font-semibold">
                    Toevoegen
                </button>
            </div>
        </form>
    </div>
@endsection
