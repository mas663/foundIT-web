<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FOUNDit</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="flex h-screen overflow-hidden">

        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col">

            @include('layouts.partials.header')

            <main class="flex-1 p-6 overflow-y-auto bg-gray-800">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
