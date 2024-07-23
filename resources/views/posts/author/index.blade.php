<x-app-layout>
    <x-slot:head>
        <title>All posts by {{ $author->name }}- {{ env('APP_NAME') }} - Posts </title>
        <meta name="description" content="Latest news on {{ $author->name }}.">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="{{ $author->name }}- {{ env('APP_NAME') }} - Posts">
        <meta property="og:description" content="Latest news on {{ $author->name }}">
        {{-- <meta property="og:image" content="" /> --}}
        {{-- <meta property="og:image:alt" content="" /> --}}
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:url" content="{{ url("/author/$author->name/posts") }}" />
    </x-slot:head>

    <x-show-posts :posts="$posts" header="author" :title="$author->name" no-href-author />
</x-app-layout>
