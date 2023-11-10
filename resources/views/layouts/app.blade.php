<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
        <title>
            @if (isset($pageTitle))
                {{ $pageTitle }} |
            @endif
            {{ config('app.name', 'Laravel') }}
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            @if (isset($headerBlog))
                <header class="main-header shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-8xl text-white text-center">{{ $headerBlog }}</h1>
                    </div>
                </header>
            @endif
            @if (isset($headerAdmin))
                <header class="lg:container mx-auto py-6">
                    <h1 class="text-4xl text-gray-800 leading-tight">
                        {{ $headerAdmin }}
                    </h1>
                </header>
            @endif

            <!-- Page Content -->
            <main class="lg:container mx-auto">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
