<x-app-layout>

    <section class="p-6 mb-10 sm:px-16 max-w-6xl space-y-6">
        <article class="mt-12">
            <div class="space-y-4">
                <div class="mb-10">
                    <h1 class="font-bold text-3xl lg:text-4xl ">
                        {{ $post->title }}
                    </h1>
                    <div class="mt-4">
                        <x-labels.category :category="$post->category" />
                        <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
                    </div>

                    <x-post-cards.author :post="$post" />
                </div>


                <div class="max-w-full md:h-[70vh] relative">
                    <img src="/storage/{{ $post->thumbnail }}" alt="{{ $post->thumbnail_alt_txt }}"
                        class="rounded-xl w-full h-full  md:object-cover">
                    <x-post-cards.img-overlay />
                </div>
            </div>




            <div class="flex flex-col ">
                <div class="text-lg my-8">
                    {!! $post->body !!}
                </div>


                <section class="flex flex-col justify-center mt-10 space-y-4 w-full h-full">

                    <div class="w-full md:w-4/5 space-y-4 lg:w-3/5">
                        <x-comment-form :post="$post" btn-label="Post" />

                        @foreach ($post->comments as $comment)
                            <x-post-comment :comment="$comment" :post="$post" />
                        @endforeach
                    </div>

                </section>
            </div>
        </article>

    </section>
    </x-layout>
