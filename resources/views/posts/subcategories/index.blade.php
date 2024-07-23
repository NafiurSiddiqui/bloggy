<x-app-layout>

    <x-slot:head>
        <title>{{ $subcategory->title }}- {{ env('APP_NAME') }} - Posts </title>
        <meta name="description" content="Latest news on {{ $subcategory->title }}.">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="{{ $subcategory->title }}- {{ env('APP_NAME') }} - Posts">
        <meta property="og:description" content="Latest news on {{ $subcategory->title }}">
        {{-- <meta property="og:image" content="" /> --}}
        {{-- <meta property="og:image:alt" content="" /> --}}
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:url"
            content="{{ url('/categories/' . $subcategory->category->slug . '/' . $subcategory->slug) }}" />
    </x-slot:head>
    <x-show-posts :posts="$posts" :subcategory="$subcategory" />
</x-app-layout>
