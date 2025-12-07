@extends('layout.app')
@section('hero')
    <section
        class="relative h-[60vh] bg-[url('/public/images/akito-sheets.png')] bg-cover bg-center bg-fixed flex items-center justify-center -z-10">
        {{-- Donkere overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Hero content --}}
        <div class="relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-lg">
                Akito's Library
            </h1>
            <p class="text-white text-base md:text-lg opacity-80 max-w-xl mx-auto">
                Ontdek alle beschikbare sheets en muziekarrangementen van Akito.
            </p>
        </div>
    </section>
@endsection

@section('content')
    <main class="pt-24 max-w-4xl mx-auto p-6">
        <div class="mb-8 w-full max-w-lg mx-auto flex flex-col gap-4">
            <form action="{{ route('sheet.search') }}" method="GET" class="flex w-full gap-2">
                <input
                    type="text"
                    name="q"
                    placeholder="Search for anime song, k-pop, anything..."
                    class="border border-gray-300 rounded-md px-4 py-1.5 text-base focus:ring-2 focus:ring-blue-300 flex-1 transition"
                />
                <button
                    type="submit"
                    class="bg-blue-700 text-white px-5 py-1.5 rounded-md font-semibold text-base hover:bg-blue-800 transition"
                >
                    Zoek
                </button>
            </form>
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
                                   @elseif($sheet->difficulty === 'Intermediate')
                                   @else
                                   @endif">
                                   {{ $sheet->difficulty }}
                                </span>
                            </div>
                            <a href="{{ asset('storage/' . $sheet->pdf) }}" target="_blank" class="text-blue-600 hover:underline">Bekijk PDF</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
@endsection
