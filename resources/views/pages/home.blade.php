@extends('layouts.app')

@section('meta')
    <title>{{ config('app.name') }} - Transform Your Business with Innovative Solutions</title>
    <meta name="description" content="We help businesses grow and succeed in the digital age with cutting-edge technology solutions and expert consulting.">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ config('app.name') }} - Transform Your Business">
    <meta property="og:description" content="Cutting-edge technology solutions for business growth">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }} - Transform Your Business">
    <meta name="twitter:description" content="Cutting-edge technology solutions for business growth">
    <meta name="twitter:image" content="{{ asset('images/twitter-card.jpg') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <x-home.hero-section />

    <!-- Services Section -->
    <x-home.services-section :services="$services" />

    <!-- About Section -->
    <x-home.about-section />

    <!-- Testimonials Section -->
    <x-home.testimonials-section :testimonials="$testimonials" />

    <!-- CTA Section -->
    <x-home.cta-section />
@endsection

@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ config('app.name') }}",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/logo.png') }}",
    "sameAs": [
        "https://facebook.com/yourcompany",
        "https://twitter.com/yourcompany",
        "https://linkedin.com/company/yourcompany"
    ],
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+1-123-456-7890",
        "contactType": "customer service",
        "availableLanguage": ["English"]
    }
}
</script>
@endpush
