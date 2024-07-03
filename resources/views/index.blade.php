<x-app-layout>
    <main class=" p-4 md:px-6 ">
        @if (isset($featured_posts) && $featured_posts)
            <section>
                <h1 class="text-2xl text-zinc-600 font-bold mb-3">Featured</h1>

                <div class="flex flex-col lg:flex-row gap-3 w-full ">
                    <x-post-cards.featured :post="$featured_posts[0]" />
                    <div class="w-full lg:w-3/5 flex flex-col gap-2 relative">
                        @foreach ($featured_posts->skip(1) as $post)
                            <x-post-cards.featured-sm :post="$post" />
                        @endforeach
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('posts.featured') }}"
                        class="text-zinc-600 hover:text text-xl
                    -zinc-800 font-semibold hover:underline italic">
                        💫 Explore Exclusive Featured Content 💫
                    </a>
                </div>
            </section>
        @endif
        @if (isset($hot) && $hot)
            <section class="my-8">
                <h1 class="text-2xl font-bold">Hot</h1>
                <div class="md:grid grid-cols-2 gap-4 space-y-4 md:space-y-0">
                    @foreach ($hot as $post)
                        <x-post-cards.hot :post="$post" />
                    @endforeach
                </div>
            </section>
        @endif
        @if (isset($posts) && $posts)
            <section>
                <div class="mt-6 bg-white shadow-sm rounded-lg space-y-4 gap-2 md:px-8 lg:px-0 lg:grid grid-cols-2">
                    <h1 class="text-2xl font-bold">All Posts</h1>
                    <p>There are {{ $post_count }} posts here</p>
                    @foreach ($posts as $post)
                        <x-post-cards.card-x :post="$post" />
                    @endforeach
                </div>
            </section>
        @else
            <p>No posts yet. stay tuned for upcoming posts.</p>
        @endif


        <aside class="borderTest">
            Trending Posts?
        </aside>

    </main>

    <footer class="borderTest">
        The footer
    </footer>

</x-app-layout>
