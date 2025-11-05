@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-white rounded-2xl shadow-lg p-10 mb-10">
        <h1 class="text-4xl font-extrabold mb-3 text-blue-900">Welkom in het Adminpaneel</h1>
        <p class="text-gray-700 text-lg mb-8">Beheer hier eenvoudig al je nieuwsberichten en sheets.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Nieuws beheren blok -->
            <div class="bg-blue-50 rounded-xl shadow p-8 flex flex-col justify-between">
                <h2 class="text-2xl font-bold text-blue-800 mb-3">Nieuws beheren</h2>
                <p class="mb-6 text-gray-700">
                    Bekijk, voeg toe, bewerk of verwijder nieuwsitems voor je site.
                </p>
                <a href="{{ route('admin.news.index') }}"
                   class="inline-block text-white bg-blue-700 hover:bg-blue-800 font-semibold py-2 px-6 rounded-xl shadow transition">
                    Ga naar nieuwsbeheer
                </a>
            </div>

            <!-- Sheets beheren blok -->
            <div class="bg-green-50 rounded-xl shadow p-8 flex flex-col justify-between">
                <h2 class="text-2xl font-bold text-green-800 mb-3">Sheets beheren</h2>
                <p class="mb-6 text-gray-700">
                    Voeg nieuwe sheet-muziek toe, pas bestaande aan of verwijder ze.
                </p>
                <a href="{{ route('admin.sheets.index') }}"
                   class="inline-block text-white bg-green-600 hover:bg-green-700 font-semibold py-2 px-6 rounded-xl shadow transition">
                    Ga naar sheetsbeheer
                </a>
            </div>
        </div>
    </div>
@endsection
