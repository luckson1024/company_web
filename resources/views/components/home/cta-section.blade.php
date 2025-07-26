@props([
    'title' => 'Ready to Transform Your Business?',
    'subtitle' => 'Let's discuss how we can help you achieve your goals.',
    'ctaText' => 'Get Started',
    'ctaUrl' => route('contact')
])

<section class="py-20 bg-gradient-to-r from-navy-blue to-electric-blue text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-sora font-bold mb-4">
                {{ $title }}
            </h2>
            <p class="text-xl text-gray-100 mb-8">
                {{ $subtitle }}
            </p>
            <div class="flex justify-center space-x-4">
                <x-button-white href="{{ $ctaUrl }}" size="lg">
                    {{ $ctaText }}
                </x-button-white>
                <x-button-outline-white href="{{ route('services') }}" size="lg">
                    View Services
                </x-button-outline-white>
            </div>
        </div>
    </div>

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <pattern id="pattern-circles" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <circle cx="10" cy="10" r="1.5" fill="currentColor"/>
            </pattern>
            <rect x="0" y="0" width="100" height="100" fill="url(#pattern-circles)"/>
        </svg>
    </div>
</section>
