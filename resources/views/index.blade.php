<x-app-layout>
    <main class="borderTest">
        @if (isset($featured) && $featured)
            <section>
                Featured Posts
                @foreach ($featured as $post)
                    <x-post-card :post="$post" />
                @endforeach

            </section>
        @endif
        @if (isset($hot) && $hot)
            <section>
                Hot
                @foreach ($hot as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </section>
        @endif
        @if (isset($posts) && $posts)
            <section>
                <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                    <h1 class="text-2xl font-bold">All Posts</h1>
                    <p>There are {{ $post_count }} posts here</p>
                    @foreach ($posts as $post)
                        <x-post-card :post="$post" />

                </div>
        @endforeach
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
