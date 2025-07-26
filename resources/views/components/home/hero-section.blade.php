@props([
    'title' => 'Transform Your Business with Innovative Solutions',
    'subtitle' => 'We help businesses grow and succeed in the digital age with cutting-edge technology solutions and expert consulting.',
    'ctaText' => 'Get Started',
    'ctaUrl' => route('contact'),
    'backgroundImage' => asset('images/hero-bg.jpg')
])

<section class="relative bg-navy-blue text-white pt-24 pb-32 overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $backgroundImage }}" alt="" class="w-full h-full object-cover opacity-10">
        <div class="absolute inset-0 bg-gradient-to-r from-navy-blue to-navy-blue/90"></div>
    </div>

    <!-- Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-sora font-bold leading-tight mb-6">
                {{ $title }}
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                {{ $subtitle }}
            </p>
            <div class="flex justify-center space-x-4">
                <x-button-primary href="{{ $ctaUrl }}" size="lg">
                    {{ $ctaText }}
                </x-button-primary>
                <x-button-secondary href="{{ route('services') }}" size="lg">
                    Learn More
                </x-button-secondary>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-b from-transparent to-off-white"></div>
    <div class="absolute -bottom-px left-0 right-0">
        <svg class="w-full h-auto" viewBox="0 0 1440 96" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 96L60 85.3C120 75 240 53 360 48C480 43 600 53 720 58.7C840 64 960 64 1080 61.3C1200 59 1320 53 1380 50.7L1440 48V0H1380C1320 0 1200 0 1080 0C960 0 840 0 720 0C600 0 480 0 360 0C240 0 120 0 60 0H0V96Z" fill="#F8F9FA"/>
        </svg>
    </div>
</section>
