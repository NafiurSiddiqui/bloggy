<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home -Bloggy</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <nav class="flex justify-between">
        <h1 class="font-bold text-2xl">Katya's Bloggy 💕 </h1>
        <ul class="borderTest flex justify-between gap-1">
            <li>All Posts</li>
            <li>Topics</li>
        </ul>
    </nav>
    <main class="borderTest">
        <section>
            Featured Posts
        </section>
        <section>
            What's hot Posts
        </section>

        <section>
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <h1 class="text-2xl">All Posts</h1>
                <p>There are {{$post_count}} posts here</p>
                @foreach ($posts as $post)
{{--                    @props(['post'])--}}

                    <article
{{--                        {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}--}}
                        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"
                    >
                        <div class="py-6 px-5">
                            <div>
{{--                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">--}}
                                <img src="{{$post->thumbnail}}" alt="text">
                            </div>

                            <div class="mt-8 flex flex-col justify-between">
                                <header>
{{--                                    <div class="space-x-2">--}}

{{--                                        <x-category-button :category="$post->category" />--}}

{{--                                    </div>--}}

                                    <div class="mt-4">
                                        <a href="/posts/{{ $post->slug }}">
                                            <h1 class="text-3xl">
                                                {{ $post->title }}
                                            </h1>
                                        </a>

                                        <span class="mt-2 block text-gray-400 text-xs">
                         Published <time>{{ $post->created_at->diffForHumans() }}</time>
                     </span>
                                    </div>
                                </header>

                                <div class="text-sm mt-4 space-y-4">

                                    {!! $post->excerpt !!}
                                </div>

                                <footer class="flex justify-between items-center mt-8">
                                    <div class="flex items-center text-sm">
{{--                                        <img src="/images/lary-avatar.svg" alt="Lary avatar">--}}
                                        <div class="border-2 rounded-full bg-gray-300 w-8 h-8"></div>
                                        <div class="ml-3">
                                            <h5 class="font-bold">
                                                {{--                                <a href="/authors/{{ $post->author->username }}" > --}}
                                                <a href="/?author={{ $post->user->name }}">
                                                    {{ $post->user->name }}
                                                </a>

                                            </h5>

                                        </div>
                                    </div>

                                    <div>
                                        <a href="/posts/{{ $post->slug }}"
                                           class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                                            More</a>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </article>

            </div>
                @endforeach

        </section>


        <aside>
            Trending Posts?
        </aside>

    </main>

    <footer class="borderTest">
        The footer
    </footer>
    </body>
</html>
