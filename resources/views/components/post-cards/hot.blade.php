@props(['post'])


<x-post-cards.layout class="">

    <div class="flex flex-col justify-between">
        <x-post-cards.header>
            <x-post-cards.heading :post="$post" />
            <div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->thumbnail_alt_txt }}"
                    class="w-full h-full aspect-[16/10] object-cover">
            </div>
            {{-- <div class="w-full h-56 bg-center bg-no-repeat bg-cover"
                    style="background-image: url({{ asset('storage/' . $post->thumbnail) }})" role="img">

                </div> --}}

            <x-labels.category :category="$post->category" />
            <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
        </x-post-cards.header>

        <x-post-cards.description :post="$post" />

        <x-post-cards.author :post="$post" />
    </div>


</x-post-cards.layout>
