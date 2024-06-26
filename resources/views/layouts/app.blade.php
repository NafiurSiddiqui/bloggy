<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    NEED FAVICON --}}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <x-editor.ck-editor-config />
    <title>{{ $title ?? 'Welcome' }}- {{ config('app.name', 'Bloggy') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 overflow-x-clip">
    @include('layouts.navigation')
    @php
        $user = auth()->user();
        // $role = Illuminate\Http\Request;
    @endphp
    <div>
        Usr role: {{ $user?->role }}

        {{ $slot }}
        <x-toast.success />
    </div>

</body>

</html>
