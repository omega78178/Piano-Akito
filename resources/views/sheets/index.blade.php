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
        <form action="{{ route('sheet.search') }}" method="GET" class="mb-8">
            <input type="text" name="q" placeholder="Zoek op titel..." class="input input-bordered w-full max-w-xs" />
            <button type="submit" class="btn btn-primary">Zoek</button>
        </form>

        <a href="{{ route('sheets.create') }}" class="btn btn-success mb-4">Nieuwe sheet toevoegen</a>

        <ul>
            @foreach($sheets as $sheet)
                <li class="mb-2 flex items-center justify-between">
                    <div>
                        <strong>{{ $sheet->title }}</strong>
                        <span class="text-sm">({{ $sheet->difficulty }})</span>
                        <a href="{{ asset('storage/' . $sheet->pdf) }}" target="_blank" class="ml-2 text-blue-700 underline">Bekijk PDF</a>
                    </div>
                    <div>
                        <a href="{{ route('sheets.edit', $sheet->id) }}" class="btn btn-xs btn-warning">Edit</a>
                        <form action="{{ route('sheets.destroy', $sheet->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-error">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </main>
@endsection
