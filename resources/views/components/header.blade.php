<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-[#0A192F]">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex sm:ml-10 sm:items-center">
                    <a href="#services" class="text-[#2D3748] hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Services
                    </a>
                    <a href="#about" class="text-[#2D3748] hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        About
                    </a>
                    <a href="#portfolio" class="text-[#2D3748] hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Portfolio
                    </a>
                    <a href="#contact" class="text-[#2D3748] hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Right Side Navigation -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <a href="{{ url('/admin') }}" class="text-[#3B82F6] hover:text-[#2563EB] px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Admin Panel
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-[#3B82F6] hover:text-[#2563EB] px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-[#2D3748] hover:text-[#3B82F6] hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#3B82F6] transition-colors">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" x-show="mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" x-show="mobileMenuOpen" x-transition>
        <div class="pt-2 pb-3 space-y-1">
            <a href="#services" class="text-[#2D3748] hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition-colors">
                Services
            </a>
            <a href="#about" class="text-[#2D3748] hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition-colors">
                About
            </a>
            <a href="#portfolio" class="text-[#2D3748] hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition-colors">
                Portfolio
            </a>
            <a href="#contact" class="text-[#2D3748] hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition-colors">
                Contact
            </a>
        </div>
    </div>
</nav>
