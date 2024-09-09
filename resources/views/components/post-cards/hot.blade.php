@props(['post'])


<x-post-cards.layout class="bg-zinc-50 !py-12">

    <div class="flex flex-col justify-between">
        <div>
            <x-post-cards.header-layout>
                <x-post-cards.heading :post="$post" />
                <div class="relative ">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->thumbnail_alt_txt }}"
                        class="w-full h-full rounded-md aspect-[16/10] object-cover">
                    <x-post-cards.img-overlay />
                </div>

                <x-labels.category :category="$post->category" />
                <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
            </x-post-cards.header-layout>
            <x-post-cards.description :post="$post" />
        </div>
        <x-post-cards.author :post="$post" />
    </div>
</x-post-cards.layout>
