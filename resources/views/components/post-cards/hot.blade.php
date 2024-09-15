@props(['post'])


<x-post-cards.layout class="bg-zinc-50 md:!pb-12">
    <div class="flex flex-col justify-between">
        <x-post-cards.content-wrapper>
            <x-post-cards.header-layout>
                <x-post-cards.heading :post="$post" />
                <div class="relative ">
                    <div class="w-full h-full rounded-md aspect-[16/10] object-cover">
                        {{ $post->getFirstMedia('thumbnails')?->img()->attributes(['alt' => "$post->thumbnail_alt_txt"]) }}
                    </div>
                    <x-post-cards.img-overlay />
                </div>

                <x-labels.category :category="$post->category" />
                <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
            </x-post-cards.header-layout>
            <x-post-cards.description :post="$post" />
        </x-post-cards.content-wrapper>
        <x-post-cards.author :post="$post" />
    </div>
</x-post-cards.layout>
