<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Homepage')</title>
</head>

<body class="bg-secondary-subtle d-flex flex-column min-vh-100">
    {{-- Navbar --}}
    <header>
        @include('partials.navbar')
    </header>

    {{-- Main --}}
    <main class="container-fluid flex-grow-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        @include('partials.footer')
    </footer>

</body>


</html>
