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
        {{-- <div class="w-full space-y-4  bg-white px-4 py-8 rounded-xl lg:px-8 lg:py-16">
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-2xl font-bold text-zinc-600 w-full text-left">Browse by Category
                </h1>
                <x-hr class="bg-gray-400" />
            </div>

            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    @if ($category->posts->isNotEmpty())
                        <x-labels.category :category="$category" />
                    @endif
                @endforeach
            @endif

        </div> --}}
        <x-browse-by-categories :categories="$categories" />
    </div>
</x-app-layout>
