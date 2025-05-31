<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite (Bootstrap incluso via app.css/app.js) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light text-dark font-sans antialiased">
    <div class="min-vh-100 d-flex flex-column">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Page Heading --}}
        @isset($header)
            <header class="bg-white shadow py-3 px-4">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="flex-grow-1 container py-4">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        @include('partials.footer')
    </div>
</body>

</html>
