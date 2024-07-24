<x-app-layout>
    <x-slot:head>
        <x-slot:title> {{ $category->title }} </x-slot:title>
        <meta name="description" content="Latest news on {{ $category->title }}.">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="{{ $category->title }}- {{ env('APP_NAME') }} - Posts">
        <meta property="og:description" content="Latest news on {{ $category->title }}">
        {{-- <meta property="og:image" content="" /> --}}
        {{-- <meta property="og:image:alt" content="" /> --}}
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:url" content="{{ url('/categories/' . $category->slug) }}" />
    </x-slot:head>
    <x-show-posts :posts="$posts" :title="$category->title" header="category" no-href-category />
</x-app-layout>
