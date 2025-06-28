<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Menambahkan style kustom untuk body --}}
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    {{-- MENGUBAH BAGIAN INI --}}
    <body class="bg-[#182328] flex items-center justify-center min-h-screen">
        <div>
            {{-- Slot ini akan diisi oleh konten dari login.blade.php --}}
            {{ $slot }}
        </div>
    </body>
</html>
