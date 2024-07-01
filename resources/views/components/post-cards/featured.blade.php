@props(['post'])


<x-post-cards.layout>
    <div class="flex flex-col md:flex-row">
        <div class="">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->thumbnail_alt_txt }}"
                class="w-full h-full  aspect-[16/12] object-cover">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <x-post-cards.header>
                <x-post-cards.heading :post="$post" />
                <x-labels.category :category="$post->category" />
                <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
            </x-post-cards.header>
            <x-post-cards.description :post="$post" />
            <x-post-cards.author :post="$post" />
        </div>

    </div>
</x-post-cards.layout>
