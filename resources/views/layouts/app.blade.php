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

<body
    class="font-sans antialiased bg-lighWhite mx-2 md:mx-4 dark:bg-darkBlack dark:text-white/50 overflow-x-clip flex flex-col items-center">

    <div class="2xl:w-[80rem]">
        @include('layouts.navigation')

        {{-- <div class="flex flex-col items-center min-h-screen"> --}}
        <main class="p-4 md:px-6 dark:bg-darkPage bg-lightPage flex flex-col items-center min-h-screen">
            {{ $slot }}
            <x-toast.success />
        </main>
        {{-- </div> --}}
        <footer class="h-[50vh] lg:h-[30vh] bg-lightWhite flex justify-center items-center dark:bg-darkBlack">
            <div class="flex justify-center flex-wrap items-center">
                <p class="text-center text-xs sm:text-sm md:text-lg text-gray-600  dark:text-gray-400 flex items-end">
                    ©{{ date('Y') }} <span class="mx-1"><x-icons.logo /></span>
                </p>
                <p>All rights reserved.</p>
            </div>
        </footer>

    </div>
</body>

</html>
