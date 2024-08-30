@props(['post'])


<x-post-cards.layout class="!p-0 w-full">
    <div class="flex relative flex-col md:flex-row bg-center bg-cover h-[60vh] lg:h-[80vh] bg-no-repeat"
        style="background-image: url({{ asset('storage/' . $post->thumbnail) }})">

        <x-post-cards.featured-overlay class="h-full" />
        <div class="h-full flex flex-col justify-end items-center p-8">
            <x-post-cards.header>
                <div class="mb-4 flex justify-center space-x-4">
                    <x-labels.category :category="$post->category" />
                    <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
                </div>
                <x-post-cards.heading :post="$post" />
            </x-post-cards.header>
            <x-post-cards.author class="w-full" :post="$post" />
        </div>

    </div>
</x-post-cards.layout>
