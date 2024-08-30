@props(['post', 'no-href-author', 'no-href-category'])
{{-- setting no-href will prevents make the category labels plain labels without links --}}

<x-post-cards.layout class=" lg:h-[25rem]  bg-zinc-50 !p-0 ">

    <div class="flex h-full">
        <div
            class="w-full p-6 xl:p-8 bg-gradient-to-r from-zinc-200 to-amber-100 sm:via-zinc-100 sm:via-50% sm:to-amber-50  relative ">
            <x-post-cards.header>
                <x-post-cards.heading :post="$post" class="text-xl md:text-2xl md:text-left leading-5" />
                <div class="relative w-full sm:hidden">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->thumbnail_alt_txt }}"
                        class="w-full h-[10rem] rounded-md object-cover border-2 border-zinc-300/70">
                    <x-post-cards.img-overlay />

                </div>
                <x-labels.category :category="$post->category" sm :no-href="isset($noHrefCategory) && $noHrefCategory" />
                <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" sm />
            </x-post-cards.header>

            <x-post-cards.description :post="$post" class="text-sm leading-4" limit="100" />
            <x-post-cards.author :post="$post" :no-href="isset($noHrefAuthor) && $noHrefAuthor" />
        </div>
        <div class="hidden sm:flex justify-end w-[98%] relative">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->thumbnail_alt_txt }}"
                class="w-full h-full   object-cover">
            <x-post-cards.img-overlay />
        </div>

    </div>

</x-post-cards.layout>
