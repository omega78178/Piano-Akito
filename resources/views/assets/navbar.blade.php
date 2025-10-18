{{-- resources/views/assets/navbar.blade.php --}}
<nav id="main-nav" class="font-open-sans fixed w-full top-0 z-50 bg-transparent transition-colors duration-500">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center justify-center h-20">
            <img src="{{ asset('images/LogoAkito.png') }}"
                 alt="Logo Akito"
                 class="h-full w-auto object-contain" />
        </div>
        <ul class="flex gap-6">
            <li><a href="{{ url('/') }}" class="text-white hover:text-blue-400">Home</a></li>
            <li><a href="{{ url('/news') }}" class="text-white hover:text-blue-400">News</a></li>
            <li><a href="{{ url('/about') }}" class="text-white hover:text-blue-400">About</a></li>
            <li><a href="{{ url('/contact') }}" class="text-white hover:text-blue-400">Contact</a></li>
            <li><a href="{{ url('/sheets') }}" class="text-white hover:text-blue-400">Sheets</a></li>
        </ul>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('main-nav');
        if(window.scrollY > 10){
            nav.classList.add('bg-black', 'shadow-md');
            nav.classList.remove('bg-transparent');
        } else {
            nav.classList.remove('bg-black', 'shadow-md');
            nav.classList.add('bg-transparent');
        }
    });
</script>
