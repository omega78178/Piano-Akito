@php use Illuminate\Support\Carbon;use Illuminate\Support\Str; @endphp
    <!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akito - piano</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="bg-gray-100 text-gray-900" x-data="{ scrolled: false }"
      x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })">

@include('assets.navbar')

<!-- Hero section -->
<section class="h-screen bg-[url('/public/images/piano.jpg')] bg-cover bg-center bg-fixed relative">
    <!-- donkere overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- content bovenop -->
    <div class="relative flex items-center justify-center h-full text-center text-white">
        <div class="p-8 border-100 border-white/0 bg-white/10 rounded-lg">
            <h1 class="text-5xl font-bold mb-4">Welcome to My Piano Blog</h1>
            <p class="inter text-xl">I want to create an opportunity where we can share your interest
                and hobby 🎶</p>

            <a href="#about-akito" class="block mt-8">
                <!-- Zet arrow.png in public/images/arrow.png -->
                <img src="{{ asset('images/arrow.png') }}"
                     alt="Scroll"
                     class="mx-auto w-14 h-14 object-contain animate-bounce"
                     loading="lazy">

            </a>
        </div>
    </div>
</section>

<!-- About Akito Section -->
<section id="about-akito" class="bg-white=
 py-60 px-20 ">
    <div class="max-w-6xl mx-auto md:flex md:flex-row-reverse gap-12 items-center md:right-12">

        <!-- Tekstgedeelte -->
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-6">
                About Akito
            </h1>
            <p class="text-black leading-relaxed mb-8">
                Akito has played many piano covers, especially from anime and video
                games, bringing their unique interpretation and emotion into each
                performance. Their repertoire includes iconic pieces from series
                like <span class="font-semibold">Attack on Titan</span>,
                <span class="font-semibold">Naruto</span>, and
                <span class="font-semibold">Final Fantasy</span>, captivating
                audiences with a blend of technical mastery and heartfelt
                expression. Beyond covers, Akito also explores original compositions
                and creative arrangements, continuously refining their musical
                style.
            </p>
            <a href="{{ url('/about') }}"
               class="inline-block px-6 py-3 bg-black text-white font-medium rounded-xl shadow-md hover:bg-blue-800 transition">
                Find Out More >
            </a>
        </div>

        <!-- Socials include -->
        <div class="flex flex-col items-center md:items-start">
            @include('assets.socials')
        </div>

        <!-- Afbeelding -->
        <div class="flex justify-center">
            <img src="{{ asset('images/Omega.jpg') }}"
                 alt="Omega"
                 class="w-300 h-72 rounded-full border-4 border-white shadow-lg object-cover">
        </div>
    </div>
</section>

<!-- News Section -->
<section id="news" class="bg-gray-50 py-20 border-t border-[#e6d8b8]/30">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-4xl font-bold mb-6 text-gray-800 text-center">News</h2>

        @if(isset($news) && $news->count())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($news as $post)
                    <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition group flex flex-col overflow-hidden">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                 class="w-full h-48 object-cover rounded-t-xl group-hover:scale-105 transition" />
                        @endif
                        <div class="p-6 flex flex-col flex-1 h-full">
                            <h3 class="font-bold text-xl text-blue-900 mb-2 group-hover:text-blue-700 transition">
                                <a href="{{ route('news.show', $post->id) }}" class="hover:underline">
                                    {{ \Illuminate\Support\Str::limit($post->title, 60, '...') }}
                                </a>
                            </h3>
                            <div class="text-gray-600 leading-relaxed mb-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->body ?? 'Nog geen inhoud beschikbaar.'), 120, '...') }}
                            </div>
                            <div class="flex items-center justify-between mt-auto pt-2">
                                <span class="text-xs text-gray-400 font-mono">
                                    @if($post->publish_date)
                                        Posted on {{ \Illuminate\Support\Carbon::parse($post->publish_date)->format('d F Y') }}
                                    @endif
                                </span>
                                <a href="{{ route('news.show', $post->id) }}"
                                   class="inline-block bg-blue-700 text-white py-2 px-4 rounded shadow hover:bg-blue-800 transition text-sm font-semibold ml-2">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="bg-white p-8 rounded-lg shadow text-center text-gray-400 max-w-lg mx-auto">
                No news articles yet.
            </div>
        @endif

        <div class="flex justify-end mt-10">
            <a href="{{ url('/news') }}"
               class="inline-block bg-black text-white font-semibold text-lg py-3 px-6 rounded-lg transition duration-300 hover:bg-white hover:text-black hover:underline shadow-md">
                View All News
            </a>
        </div>
    </div>
</section>

<div class="text-center py-20 bg-white border-t border-[#e6d8b8]/30">
    <div class="Sheet-link mb-8">
        <h1 class="text-4xl font-bold mb-6 text-gray-800">Sheets</h1>

        <img src="{{ asset('images/Sheets.jpg') }}"
             alt="Sheet Music"
             class="w-full max-w-3xl mx-auto rounded-xl shadow-lg mb-6">
    </div>

    <div class="Sheet-text max-w-3xl mx-auto text-left">
        <p class="max-w-3xl mx-auto text-gray-700 mb-8 text-lg">
            Explore my collection of sheet music! Feel free to use these sheets for your practice,
            performances, or personal enjoyment. Whether you're a beginner or an advanced musician,
            I hope you find something inspiring here.
        </p>

        <a href="{{ url('/sheets') }}"
           class="inline-block bg-black text-white font-semibold text-lg py-3 px-6 rounded-lg transition duration-300 hover:bg-white hover:text-black hover:underline shadow-md">
            Explore Sheets
        </a>
    </div>
</div>

<div class="">
    @include('assets.footer')
</div>

</body>
</html>
