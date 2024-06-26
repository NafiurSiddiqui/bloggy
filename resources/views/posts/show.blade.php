<x-app-layout>

    <section class="px-6 py-8 ">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    {{-- <img src="/storage/{{ $post->thumbnail }}" alt="" class="rounded-xl"> --}}
                    <img src="{{ $post->thumbnail }}" alt="" class="rounded-xl">
                    <x-category-label :category="$post->category" />
                    <x-category-label :category="$post->category" :subcategory="$post->subcategory" />
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>


                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <x-user-avatar sm :user="$post->author" />
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ $post->author->name }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            < Back to Posts </a>
                    </div>


                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>

                <section class="col-span-8 col-start-5 mt-10 space-y-4">

                    <x-comment-form :post="$post" btn-label="Post" />

                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment" :post="$post" />
                    @endforeach

                </section>
            </article>
        </main>
    </section>
    </x-layout>


    {{-- You can choose either way of defining your dynamic image path here
    - the latter include full url
    - the former include relative url
     --}}
