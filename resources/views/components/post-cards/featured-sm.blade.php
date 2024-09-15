@props(['post'])


<x-post-cards.layout class="!p-0 w-full lg:h-[50%] flex-1 ">
    <div class="flex relative flex-col md:flex-row bg-center bg-cover h-[400px] lg:h-full bg-no-repeat rounded-md"
        style="background-image: url({{ asset('storage/' . $post->thumbnail) }})">

        <x-post-cards.featured-overlay class="h-[400px] lg:h-full" />
        <div class="flex flex-wrap items-baseline justify-end space-y-1 space-x-4 absolute right-4 top-4">
            <x-labels.category :category="$post->category" />
            <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
        </div>

        <div class="h-full flex flex-col justify-end items-center p-2 pb-8  ml-4">
            <x-post-cards.header-layout class="w-full">
                <x-post-cards.heading :post="$post" class="lg:!text-2xl" />
                </x-post-cards.header-layo>
                <x-post-cards.author class="w-full" :post="$post" featured />
        </div>

    </div>
</x-post-cards.layout>
