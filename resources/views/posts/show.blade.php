<x-app-layout>

    <section class="p-6 mb-10 sm:px-16 max-w-6xl space-y-6 flex flex-col justify-center items-center lg:px-20">
        <article class="mt-12 lg:w-4/5">
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

                <div class="">
                    <ul class="flex justify-between">
                        <li class="box-border  w-1/2 lg:w-2/5 p-1 mr-2 group">
                            @if ($previousPost)
                                <a href="/post/{{ $previousPost->slug }}">
                                    {{-- fontawesome previous btn --}}
                                    <div class="italic mb-2 text-sm text-left text-zinc-600 group-hover:text-zinc-700">
                                        <i class="fa-solid fa-chevron-left"></i>
                                        Previous
                                    </div>
                                    <span class="font-semibold text-zinc-600 group-hover:text-zinc-800 text-left">Some
                                        Long ass Post title that goes on forever and ever
                                    </span>
                                </a>
                            @endif
                        </li>
                        <li class="box-border w-1/2 lg:w-2/5 p-1 group">
                            @if ($nextPost)
                                <a href="/post/{{ $nextPost->slug }}">

                                    <div class="italic mb-2 text-sm text-right text-zinc-600 group-hover:text-zinc-700">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Next
                                    </div>
                                    <span
                                        class="font-semibold text-zinc-600 group-hover:text-zinc-800 inline-block text-right">Some
                                        Long ass Post title that goes on forever and ever
                                    </span>
                                </a>
                            @endif
                        </li>
                    </ul>
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
