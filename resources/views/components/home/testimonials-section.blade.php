@props([
    'testimonials' => []
])

<section class="py-20 bg-navy-blue text-white" x-data="{ activeSlide: 0 }">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-sora font-bold mb-4">
                What Our Clients Say
            </h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Don't just take our word for it. Here's what our clients have to say about working with us.
            </p>
        </div>

        <!-- Testimonials Slider -->
        <div class="max-w-4xl mx-auto relative">
            <!-- Testimonials -->
            <div class="relative">
                @foreach($testimonials as $index => $testimonial)
                <div x-show="activeSlide === {{ $index }}"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 transform translate-x-0"
                     x-transition:leave-end="opacity-0 transform -translate-x-4"
                     class="text-center">
                    <div class="mb-8">
                        <img src="{{ $testimonial->author_image }}" alt="{{ $testimonial->author_name }}" 
                             class="w-20 h-20 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-semibold">{{ $testimonial->author_name }}</h3>
                        <p class="text-gray-300">{{ $testimonial->author_title }}</p>
                    </div>
                    <blockquote class="text-xl italic mb-8">
                        "{{ $testimonial->content }}"
                    </blockquote>
                </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-center space-x-2 mt-8">
                @foreach($testimonials as $index => $testimonial)
                <button @click="activeSlide = {{ $index }}"
                        :class="{ 'bg-electric-blue': activeSlide === {{ $index }}, 'bg-gray-500': activeSlide !== {{ $index }} }"
                        class="w-3 h-3 rounded-full transition-colors duration-300">
                </button>
                @endforeach
            </div>

            <!-- Arrow Navigation -->
            <button @click="activeSlide = (activeSlide - 1 + {{ count($testimonials) }}) % {{ count($testimonials) }}"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-12 text-white hover:text-electric-blue transition-colors">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="activeSlide = (activeSlide + 1) % {{ count($testimonials) }}"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-12 text-white hover:text-electric-blue transition-colors">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>
