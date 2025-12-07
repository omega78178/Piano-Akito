@extends('layout.app')

@section('hero')
    <section
        class="relative h-screen bg-cover bg-center bg-fixed -z-10"
        style="background-image: url('{{ asset('images/nieuws.jpg') }}');">
        {{-- Donkere overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>

        {{-- Hero content --}}
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-wide">
                News
            </h1>
        </div>
    </section>
@endsection

@section('content')
    <main class="pt-24 max-w-4xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($news as $post)
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition group overflow-hidden flex flex-col">
                    @if($post->image)
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                 class="w-full h-48 object-cover rounded-t-xl group-hover:scale-105 transition" />
                        </div>
                    @endif

                    <div class="p-6 flex flex-col flex-1 h-full">
                        <h2 class="font-bold text-lg text-blue-900 mb-2 group-hover:text-blue-700 transition">
                            <a href="{{ route('news.show', $post->id) }}" class="hover:underline">
                                {{ \Illuminate\Support\Str::limit($post->title, 60, '...') }}
                            </a>
                        </h2>
                        <div class="text-gray-600 leading-relaxed mb-3">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->body ?? 'Nog geen inhoud beschikbaar.'), 120, '...') }}
                        </div>
                        <div class="flex items-center justify-between mt-auto pt-2">
                    <span class="text-xs text-gray-400 font-mono">
                        @if($post->publish_date)
                            Geplaatst op {{ \Illuminate\Support\Carbon::parse($post->publish_date)->format('d F Y') }}
                        @endif
                    </span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </main>
@endsection
