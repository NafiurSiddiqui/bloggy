@props(['post'])


<x-post-cards.layout class="px-0 py-0">

    <div class="flex">

        <div class="w-full p-2">
            <x-post-cards.header>
                <x-post-cards.heading :post="$post" class="text-lg  leading-5" />
                <x-labels.category :category="$post->category" sm />
                <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" sm />
            </x-post-cards.header>

            <x-post-cards.description :post="$post" limit="50" class="text-sm leading-4" />

            <x-post-cards.author :post="$post" />
        </div>
        <div class="borderTest flex justify-end w-4/5">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->thumbnail_alt_txt }}"
                class="w-full h-full rounded-r-md  object-cover">
        </div>
    </div>

</x-post-cards.layout>
