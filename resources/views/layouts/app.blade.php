<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title?? 'Welcome'}}- {{config('app.name', 'Bloggy')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
{{--<nav class="flex justify-between">--}}
{{--    <h1 class="font-bold text-2xl">Katya's Bloggy 💕 </h1>--}}
{{--    <ul class="borderTest flex justify-between gap-1">--}}
{{--        <li>All Posts</li>--}}
{{--        <li>Topics</li>--}}
{{--    </ul>--}}
{{--</nav>--}}
@include('layouts.navigation')
<main>
    {{$slot}}
</main>

</body>
</html>
