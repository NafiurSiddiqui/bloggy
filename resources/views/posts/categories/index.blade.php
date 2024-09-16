<x-app-layout>
    <x-slot:head>
        <x-slot:title> Browse by Category </x-slot:title>
        <meta name="description" content="Browse by all categories, web3, cybersecurity, programming.">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="Browse by categories- {{ env('APP_NAME') }} - Posts">
        <meta property="og:description" content="Browse by categories">
        {{-- <meta property="og:image" content="" /> --}}
        {{-- <meta property="og:image:alt" content="" /> --}}
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:url" content="{{ url('/categories/') }}" />
    </x-slot:head>
    <div class="sm:w-4/5 lg:w-3/5 mt-8 px-2 ">

        <x-browse-by-category />
    </div>
</x-app-layout>
