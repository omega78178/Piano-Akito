@extends('layout.admin')
@section('title', 'Nieuwsbeheer')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Nieuws beheren</h1>
    <a href="{{ route('admin.news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block font-semibold">Nieuw bericht toevoegen</a>
    <table class="w-full bg-white rounded shadow text-left">
        <thead>
        <tr>
            <th class="p-4">Titel</th>
            <th class="p-4">Datum</th>
            <th class="p-4">Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $item)
            <tr class="border-b">
                <td class="p-4">{{ $item->title }}</td>
                <td class="p-4">{{ $item->publish_date }}</td>
                <td class="p-4 flex gap-2">
                    <a href="{{ route('admin.news.edit', $item) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Bewerk</a>
                    <form action="{{ route('admin.news.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Verwijderen?')">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
