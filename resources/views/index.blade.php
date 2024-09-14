<x-app-layout>

    <x-slot:head>
        <title>Home - {{ env('APP_NAME') }} - Find Featured, Hot, & All Blog Posts </title>
        <meta name="description"
            content="All things Web3, Cybersecurity, Programming - Explore our featured content, hot topics, and browse through all our engaging blog posts.">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="Home - {{ env('APP_NAME') }} - Find Featured, Hot, & All Blog Posts">
        <meta property="og:description"
            content="All things Web3, cybersecurity, programming - Explore our featured content, hot topics, and browse through all our engaging blog posts.">
        {{-- <meta property="og:image" content="" /> --}}
        {{-- <meta property="og:image:alt" content="" /> --}}
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:url" content="{{ url('/') }}" />
    </x-slot:head>




    <main class=" p-4 md:px-6 2xl:w-4/5 dark:bg-darkPage">
        @if (isset($featured_posts) && $featured_posts)
            <section>
                <x-h2>Featured </x-h2>
                @php
                    $flexOrNot = count($featured_posts) > 1 ? 'lg:flex-row' : '';
                @endphp
                <div class="flex flex-col {{ $flexOrNot }} gap-3 w-full ">
                    <x-post-cards.featured :post="$featured_posts[0]" />
                    <div class="w-full lg:w-3/5 flex flex-col gap-2 relative">
                        @foreach ($featured_posts->skip(1)->take(2) as $post)
                            <x-post-cards.featured-sm :post="$post" />
                        @endforeach
                    </div>
                </div>
                @if ($featured_posts->count() > 3)
                    <x-post-cards.section-cta link="posts.featured" />
                @endif
            </section>
        @endif
        @if (isset($hot) && $hot)
            <section class="my-8 md:px-4">
                <x-h2>Hot</x-h2>
                <div class="lg:grid grid-cols-2 gap-4 space-y-4 md:space-y-0">
                    @foreach ($hot->take(4) as $post)
                        <x-post-cards.hot :post="$post" />
                    @endforeach
                </div>

                @if ($hot->count() > 3)
                    <x-post-cards.section-cta link="posts.hot" />
                @endif
            </section>
        @endif

        @if (isset($posts) && $posts)
            <section>
                <x-h2>All Posts</x-h2>
                <div class="space-y-4 lg:space-y-0 gap-2 md:px-8 xl:px-0  xl:grid grid-cols-2">
                    @foreach ($posts->take(8) as $post)
                        <x-post-cards.card-x :post="$post" />
                    @endforeach
                </div>
                @if ($posts->count() > 8)
                    <x-post-cards.section-cta link="posts.all" />
                @endif
            </section>
        @else
            <p class="text-gray-600 text-2xl mt-28 text-center"> New saucy stuff is cooking. Coming soon!</p>
        @endif


    </main>


</x-app-layout>
