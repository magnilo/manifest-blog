<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('logo.svg') }}" type="image/svg+xml">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased bg-gradient-to-br from-surface-50 via-white to-surface-100 selection:bg-brand-500 selection:text-white">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            
            <!-- Decorative Background -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none -z-10">
                <div class="absolute top-[-10%] right-[-5%] w-96 h-96 bg-brand-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
                <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-secondary-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
            </div>

            <div class="mb-6">
                <a href="/" class="flex flex-col items-center gap-2 group">
                    <img src="{{ asset('logo.svg') }}" alt="Logo" class="w-16 h-16 rounded-2xl shadow-lg shadow-brand-500/20 group-hover:scale-110 transition-transform duration-300">
                    <span class="font-extrabold text-2xl tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-secondary-600">
                        Manifest<span class="text-brand-600">.</span>
                    </span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-4 px-8 py-8 bg-white/80 backdrop-blur-xl shadow-2xl shadow-gray-200/50 border border-white/50 rounded-3xl">
                {{ $slot }}
            </div>
            
            <p class="mt-8 text-sm text-gray-500">
                &copy; {{ date('Y') }} Manifest. All rights reserved.
            </p>
        </div>
    </body>
</html>
