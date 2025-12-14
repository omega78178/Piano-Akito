@extends('layout.admin')

@section('title', 'Sheets beheren')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Sheet-muziek beheren</h1>

    <a href="{{ route('admin.sheets.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-6 inline-block font-semibold hover:bg-green-700 transition">
        + Nieuwe sheet toevoegen
    </a>

    <table class="w-full bg-white rounded-xl shadow text-left">
        <thead>
        <tr>
            <th class="p-4">Titel</th>
            <th class="p-4">Moeilijkheid</th>
            <th class="p-4">PDF</th>
            <th class="p-4">Acties</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sheets as $sheet)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4 font-semibold text-blue-900">{{ $sheet->title }}</td>
                <td class="p-4 font-mono">{{ $sheet->difficulty ?? '-' }}</td>
                <td class="p-4">
                    @if($sheet->pdf_path)
                        <a href="{{ asset('storage/' . $sheet->pdf_path) }}" target="_blank" class="text-green-700 underline">Bekijk PDF</a>
                    @else
                        <span class="text-gray-400">Geen PDF</span>
                    @endif
                </td>
                <td class="p-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.sheets.edit', $sheet) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 transition">
                            Bewerk
                        </a>

                        <form action="{{ route('admin.sheets.destroy', $sheet) }}"
                              method="GET"
                              onsubmit="return confirm('Weet je zeker dat je deze sheet wilt verwijderen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition">
                                Verwijder
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-6 text-gray-500 italic text-center">Er zijn nog geen sheets toegevoegd.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
