<x-app-layout>
    <main class="borderTest px-4 md:px-6 lg:w-4/5">
        @if (isset($featured_posts) && $featured_posts)
            <section>
                Featured Posts
                @foreach ($featured_posts as $post)
                    <x-post-cards.featured :post="$post" />
                @endforeach

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
                <div class="mt-6 bg-white shadow-sm rounded-lg space-y-4">
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
