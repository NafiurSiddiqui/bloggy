<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    NEED FAVICON --}}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{ $head ?? null }}
    <title>{{ $title ?? 'Welcome' }}- {{ config('app.name', 'Bloggy') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-[#F8F7F5] dark:bg-black dark:text-white/50 overflow-x-clip">
    @include('layouts.navigation')

    <div class="flex flex-col items-center min-h-screen">
        {{ $slot }}
        <x-toast.success />
    </div>
    <footer class="h-[20vh] mt-20 bg-stone-200 flex justify-center items-center">

        <p class="text-center text-gray-600 dark:text-gray-400 flex items-end">©
            {{ date('Y') }}
            <x-icons.logo />
            . All rights reserved.
        </p>
    </footer>

</body>

</html>
