@props(['post'])


<x-post-cards.layout class="!p-0 w-full  lg:h-[50%] flex-1 ">
    <div class="flex relative flex-col md:flex-row bg-center bg-cover h-full bg-no-repeat rounded-md"
        style="background-image: url({{ asset('storage/' . $post->thumbnail) }})">

        <x-post-cards.featured-overlay class="h-[60vh] lg:h-full" />

        <div class="h-full flex flex-col justify-end items-center p-2 pb-8 space-y-4 ml-4">
            <x-post-cards.header class="w-full">
                <div class="flex justify-center space-x-4">
                    <x-labels.category :category="$post->category" sm />
                    <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" sm />
                </div>
                <x-post-cards.heading :post="$post" class="!text-2xl mt-2" />
            </x-post-cards.header>
            <x-post-cards.author class="mt-0 w-full" :post="$post" />
        </div>

    </div>
</x-post-cards.layout>
