@props([
    'href' => '#',
    'size' => 'md'
])

@php
    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-2.5 text-base',
        'lg' => 'px-8 py-3 text-lg'
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'inline-flex items-center justify-center rounded-lg font-medium transition-all 
               bg-electric-blue hover:bg-electric-blue/90 text-white shadow-sm hover:shadow 
               focus:outline-none focus:ring-2 focus:ring-electric-blue focus:ring-offset-2 ' . $sizes[$size]
]) }}>
    {{ $slot }}
</a>
