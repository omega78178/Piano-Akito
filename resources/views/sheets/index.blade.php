@extends('layout.app')

@section('hero')
    <section
        class="relative h-[45vh] sm:h-[55vh] md:h-[60vh]
           bg-[url('/public/images/akito-sheets.png')]
           bg-cover bg-center bg-fixed
           flex items-center justify-center">

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Content --}}
        <div class="relative z-10 px-4 text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white mb-3 drop-shadow-lg">
                Akito's Library
            </h1>
        </div>
    </section>
@endsection

@section('content')
    <main class="pt-16 sm:pt-20 md:pt-24 max-w-6xl mx-auto px-4 sm:px-6">

        {{-- Search --}}
        <div class="mb-10 flex justify-center">
            <form action="{{ route('sheet.search') }}" method="GET"
                  class="w-full max-w-xl flex flex-col sm:flex-row gap-3">

                <input
                    type="text"
                    name="q"
                    placeholder="Search anime, k-pop, classical..."
                    class="w-full border border-gray-300 rounded-md px-4 py-2
                       text-sm sm:text-base
                       focus:ring-2 focus:ring-blue-300 transition"
                />

                <button
                    type="submit"
                    class="bg-blue-700 text-white px-6 py-2 rounded-md
                       text-sm sm:text-base font-semibold
                       hover:bg-blue-800 transition">
                    Search
                </button>
            </form>
        </div>

        {{-- Sheets --}}
        @if($sheets->isEmpty())
            <div class="p-8 bg-gray-50 rounded-lg text-center text-gray-500 shadow">
                No sheets available
            </div>
        @else
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($sheets as $sheet)
                    <li
                        class="bg-white border rounded-xl shadow-sm p-5
                           flex flex-col justify-between
                           hover:shadow-lg transition group">

                        <div>
                            <div class="flex items-start justify-between gap-3 mb-3">
                                <h3 class="text-base sm:text-lg font-bold text-blue-800 group-hover:text-blue-900 transition">
                                    {{ $sheet->title }}
                                </h3>

                                <span class="shrink-0 px-2 py-1 rounded text-xs font-semibold
                                @if($sheet->difficulty === 'Beginner')
                                    bg-green-100 text-green-700
                                @elseif($sheet->difficulty === 'Intermediate')
                                    bg-yellow-100 text-yellow-700
                                @else
                                    bg-red-100 text-red-700
                                @endif">
                                {{ $sheet->difficulty }}
                            </span>
                            </div>
                        </div>

                        <a href="{{ asset('storage/' . $sheet->pdf) }}"
                           target="_blank"
                           class="mt-4 inline-block text-sm sm:text-base
                              text-blue-600 hover:underline">
                            Download PDF
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
@endsection
