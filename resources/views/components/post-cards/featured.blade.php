@props(['post'])



<x-post-cards.layout class="!p-0 w-full">
    <div class="flex relative flex-col md:flex-row bg-center bg-cover h-[400px] lg:h-[600px] bg-no-repeat"
        style="background-image: url({{ $post->getFirstMedia('thumbnails')?->getUrl() }})">
        <x-post-cards.featured-overlay class="h-full" />
        <div class="flex flex-wrap items-baseline justify-end space-y-1 space-x-4 absolute right-4 top-4">
            <x-labels.category :category="$post->category" />
            <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
        </div>
        <div class="h-full flex flex-col justify-end items-center p-8">
            <x-post-cards.header-layout>
                <x-post-cards.heading :post="$post" />
            </x-post-cards.header-layout>
            <x-post-cards.author class="w-full" :post="$post" featured />
        </div>
    </div>
</x-post-cards.layout>
