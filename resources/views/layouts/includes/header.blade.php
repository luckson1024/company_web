<header class="bg-white shadow-sm fixed w-full top-0 z-50">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-semibold text-[#0A192F]">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="hidden md:flex items-center ml-8 space-x-6">
                    <a href="#services" class="text-[#2D3748] hover:text-[#3B82F6] transition-colors">Services</a>
                    <a href="#about" class="text-[#2D3748] hover:text-[#3B82F6] transition-colors">About</a>
                    <a href="#portfolio" class="text-[#2D3748] hover:text-[#3B82F6] transition-colors">Portfolio</a>
                    <a href="#contact" class="text-[#2D3748] hover:text-[#3B82F6] transition-colors">Contact</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('/admin') }}" class="text-[#3B82F6] hover:underline">Admin Panel</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 border border-[#3B82F6] text-[#3B82F6] rounded-lg hover:bg-[#3B82F6] hover:text-white transition-colors">Login</a>
                @endauth
            </div>
        </div>
    </nav>
</header>

<!-- Mobile Menu -->
<div x-data="{ open: false }" class="md:hidden fixed bottom-0 left-0 right-0 z-50">
    <button @click="open = !open" class="fixed right-4 bottom-4 bg-[#3B82F6] text-white p-3 rounded-full shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    <nav x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform translate-y-full"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-full"
         class="fixed bottom-16 inset-x-4 bg-white rounded-lg shadow-lg p-4">
        <div class="flex flex-col space-y-4">
            <a href="#services" class="px-4 py-2 text-[#2D3748] hover:bg-[#F8F9FA] rounded-lg">Services</a>
            <a href="#about" class="px-4 py-2 text-[#2D3748] hover:bg-[#F8F9FA] rounded-lg">About</a>
            <a href="#portfolio" class="px-4 py-2 text-[#2D3748] hover:bg-[#F8F9FA] rounded-lg">Portfolio</a>
            <a href="#contact" class="px-4 py-2 text-[#2D3748] hover:bg-[#F8F9FA] rounded-lg">Contact</a>
        </div>
    </nav>
</div>
