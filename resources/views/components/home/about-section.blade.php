@props([
    'title' => 'About Us',
    'subtitle' => 'Your Trusted Technology Partner',
    'description' => 'We are a team of passionate technology experts dedicated to helping businesses succeed in the digital age.',
    'stats' => [
        ['number' => '10+', 'label' => 'Years Experience'],
        ['number' => '500+', 'label' => 'Projects Completed'],
        ['number' => '100+', 'label' => 'Happy Clients'],
        ['number' => '50+', 'label' => 'Team Members']
    ]
])

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div>
                <h2 class="text-3xl md:text-4xl font-sora font-bold text-navy-blue mb-4">
                    {{ $title }}
                </h2>
                <p class="text-xl text-electric-blue font-medium mb-4">
                    {{ $subtitle }}
                </p>
                <p class="text-lg text-charcoal-gray mb-8">
                    {{ $description }}
                </p>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-6">
                    @foreach($stats as $stat)
                    <div>
                        <div class="text-3xl font-sora font-bold text-teal-green mb-1">
                            {{ $stat['number'] }}
                        </div>
                        <div class="text-charcoal-gray">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- CTA Button -->
                <div class="mt-8">
                    <x-button-primary href="{{ route('about') }}">
                        Learn More About Us
                    </x-button-primary>
                </div>
            </div>

            <!-- Image -->
            <div class="relative">
                <img src="{{ asset('images/about-summary.jpg') }}" alt="About Us" class="rounded-xl shadow-lg w-full">
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-electric-blue rounded-xl -z-10"></div>
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-teal-green rounded-xl -z-10"></div>
            </div>
        </div>
    </div>
</section>
