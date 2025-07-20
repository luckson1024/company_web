@props(['type' => 'info'])

@php
    $base = 'px-4 py-3 rounded mb-4 text-sm ';
    $types = [
        'success' => $base.'bg-green-100 text-green-800',
        'error' => $base.'bg-red-100 text-red-800',
        'warning' => $base.'bg-yellow-100 text-yellow-800',
        'info' => $base.'bg-blue-100 text-blue-800',
    ];
@endphp

<div {{ $attributes->merge(['class' => $types[$type] ?? $types['info']]) }}>
    {{ $slot }}
</div>
