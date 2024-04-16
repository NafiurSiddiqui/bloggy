<x-layout>
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
{{--                @php--}}
{{--                dd($posts);--}}
{{--                 @endphp--}}
                <p>There are {{$post_count}} posts here</p>
                @foreach ($posts as $post)
                    {{--                    @props(['post'])--}}
                    <article
                        class="transition-colors duration-300 hover:bg-gray-100   rounded-xl borderTest "
                    >
                        <div class="py-6 px-5">
                            <div>
                                {{--                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">--}}
                                <img src="{{$post->thumbnail}}" alt="text">
                            </div>

                            <div class="mt-8 flex flex-col justify-between">
                                <header class="space-y-2">
                                    {{--                                    <div class="space-x-2">--}}

                                    {{--                                        <x-category-button :category="$post->category" />--}}

                                    {{--                                    </div>--}}

                                    <div class="mt-4 space-y-4">
                                        <a href="/posts/{{ $post->slug }}">
                                            <h1 class="text-3xl">
                                                {{ $post->title }}
                                            </h1>
                                        </a>

                                        <div class="imt-2 block text-gray-400 text-xs">
                                            Published <time>{{ $post->created_at->diffForHumans() }}</time>
                                        </div>
                                    </div>

                                    <x-category-label :category="$post->category"/>
                                    <x-category-label :subcategory="$post->subcategory"/>

                                </header>

                                <div class="text-sm mt-4 space-y-4">
                                    {!! $post->excerpt !!}
                                </div>

                                <footer class="flex justify-between items-center mt-8">
                                    <div class="flex items-center text-sm">
                                        {{--                                        <img src="/images/lary-avatar.svg" alt="Lary avatar">--}}
                                        <x-avatar />
                                        <div class="ml-3">
                                            <h5 class="font-bold">
                                                <a href="/?author={{ $post->author->name }}">
                                                    {{ $post->author->name }}
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
</x-layout>
