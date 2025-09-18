@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 text-gray-100 rounded-lg p-10 text-center shadow-lg">
        <h1 class="text-4xl font-bold mb-4">Welkom op mijn PianoSite 🎹</h1>
        <p class="text-lg mb-6">Hier deel ik updates over mijn pianoprojecten en muziekavonturen.</p>
        <a href="{{ url('/news') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Bekijk Nieuws
        </a>
    </div>
@endsection
