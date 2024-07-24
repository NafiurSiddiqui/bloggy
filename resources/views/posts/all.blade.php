<x-app-layout>
    <x-slot:head>
        <x-slot:title>All posts</x-slot:title>
        <meta name="description" content="All posts regarding web3, cybersecurity, programming.">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="All posts from {{ env('APP_NAME') }} - web3, cybersecurity, programming">
        <meta property="og:description" content="All posts regarding web3, cybersecurity, programming.">
        {{-- <meta property="og:image" content="" /> --}}
        {{-- <meta property="og:url" content="{{ url('/posts/all-posts'}}" /> --}}
        {{-- <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:image:alt" content="" /> --}}
    </x-slot:head>

    <x-show-posts :posts="$posts" header="All Posts" :pagination-items="$posts" />

</x-app-layout>
