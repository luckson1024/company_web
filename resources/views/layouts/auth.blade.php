<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name') }} - @yield('title', 'Authentication')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Sora:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-inter antialiased bg-off-white text-navy-blue">
    <div class="min-h-screen flex flex-col">
        <!-- Header with Logo -->
        <header class="py-6">
            <div class="container mx-auto px-4">
                <a href="{{ route('home') }}" class="flex justify-center">
                    <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}" class="h-12">
                </a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-12">
            <div class="container mx-auto px-4">
                <div class="max-w-md mx-auto">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-6">
            <div class="container mx-auto px-4 text-center text-charcoal-gray">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>
