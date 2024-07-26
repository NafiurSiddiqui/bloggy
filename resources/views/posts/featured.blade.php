<x-app-layout>
    <x-slot:head>
        <x-slot:title>Featured posts</x-slot:title>
        <meta name="description" content="Featured posts - web3, cybersecurity, programming.">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="Featured posts from {{ env('APP_NAME') }} - web3, cybersecurity, programming">
        <meta property="og:description" content="Featured posts - web3, cybersecurity, programming.">
        {{-- <meta property="og:image" content="" /> --}}
        {{-- <meta property="og:url" content="{{ url('/posts/all-posts'}}" /> --}}
        {{-- <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:image:alt" content="" /> --}}
    </x-slot:head>

    <x-show-posts :posts="$featuredPosts" header="Featured Posts" :pagination-items="$featuredPosts" />

</x-app-layout>
