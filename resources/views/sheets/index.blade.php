@extends('layout.app')

@section('title', 'Nieuws - PianoSite')

@section('hero')
    <section class="relative h-[75vh] bg-[url('/public/images/img.png')] bg-cover bg-center bg-fixed max-w-8xl mx-auto p-100">
        <div class="absolute inset-0 bg-black/60 pointer-events-none"></div>
        <div class="relative">
            <h1 class="text-center text-3xl font-bold mb-6 text-white">Akito's Library</h1>
        </div>
    </section>
@endsection

@section('content')
    <main class="pt-24 max-w-4xl mx-auto p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <form action="{{ route('sheet.search') }}" method="GET" class="flex gap-2">
                <input type="text" name="q" placeholder="Zoek op titel..." class="border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-300 transition w-full md:w-64" />
                <button type="submit" class="bg-blue-700 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-800 transition">Zoek</button>
            </form>
            <a href="{{ route('sheets.create') }}" class="bg-green-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-green-700 transition whitespace-nowrap">
                + Nieuwe sheet toevoegen
            </a>
        </div>

        @if(count($sheets) === 0)
            <div class="p-8 bg-gray-50 rounded-lg text-center text-gray-500 shadow">
                Geen sheets gevonden...
            </div>
        @else
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($sheets as $sheet)
                    <li class="bg-white border rounded-lg shadow-sm p-6 flex flex-col justify-between hover:shadow-xl transition group">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <strong class="text-lg font-bold text-blue-800 group-hover:text-blue-900 transition">{{ $sheet->title }}</strong>
                                <span class="px-2 py-1 rounded text-xs
                                   @if($sheet->difficulty === 'Beginner') bg-green-100 text-green-700
                                   @elseif($sheet->difficulty === 'Intermediate') bg-yellow-100 text-yellow-700
                                   @else bg-red-100 text-red-600
                                   @endif">
                                   {{ $sheet->difficulty }}
                                </span>
                            </div>
                            <a href="{{ asset('storage/' . $sheet->pdf) }}" target="_blank" class="text-blue-600 hover:underline">Bekijk PDF</a>
                        </div>
                        <div class="mt-6 flex gap-2">
                            <a href="{{ route('sheets.edit', $sheet->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition text-sm font-medium">Bewerk</a>
                            <form action="{{ route('sheets.destroy', $sheet->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je wilt verwijderen?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition text-sm font-medium">Verwijder</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
@endsection
