@props([
    'title' => 'Our Services',
    'subtitle' => 'Discover how we can help your business grow',
    'services' => []
])

<section class="py-20 bg-off-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-sora font-bold text-navy-blue mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-charcoal-gray max-w-2xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6">
                <!-- Service Icon -->
                <div class="w-12 h-12 rounded-lg bg-electric-blue/10 flex items-center justify-center mb-4">
                    <i class="{{ $service->icon }} text-electric-blue text-xl"></i>
                </div>

                <!-- Service Content -->
                <h3 class="text-xl font-sora font-semibold text-navy-blue mb-3">
                    {{ $service->name }}
                </h3>
                <p class="text-charcoal-gray mb-4">
                    {{ $service->description }}
                </p>

                <!-- Learn More Link -->
                <a href="{{ route('services.show', $service) }}" class="inline-flex items-center text-electric-blue hover:text-electric-blue/80 font-medium transition-colors">
                    Learn More
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>

        <!-- View All Services Button -->
        <div class="text-center mt-12">
            <x-button-secondary href="{{ route('services') }}">
                View All Services
            </x-button-secondary>
        </div>
    </div>
</section>
