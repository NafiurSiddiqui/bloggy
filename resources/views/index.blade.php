<x-app-layout>


    <main class=" p-4 md:px-6 2xl:w-4/5">
        @if (isset($featured_posts) && $featured_posts)
            <section>
                <x-h2>Featured </x-h2>
                @php
                    $flexOrNot = count($featured_posts) > 1 ? 'lg:flex-row' : '';
                @endphp
                <div class="flex flex-col {{ $flexOrNot }} gap-3 w-full ">
                    <x-post-cards.featured :post="$featured_posts[0]" />
                    <div class="w-full lg:w-3/5 flex flex-col gap-2 relative">
                        @foreach ($featured_posts->skip(1)->take(2) as $post)
                            <x-post-cards.featured-sm :post="$post" />
                        @endforeach
                    </div>
                </div>
                @if ($featured_posts->count() > 3)
                    <x-post-cards.section-cta link="posts.featured">
                        💫 Explore More 💫
                    </x-post-cards.section-cta>
                @endif
            </section>
        @endif
        @if (isset($hot) && $hot)
            <section class="my-8 md:px-4">
                <x-h2>Hot</x-h2>
                <div class="lg:grid grid-cols-2 gap-4 space-y-4 md:space-y-0">
                    @foreach ($hot->take(4) as $post)
                        <x-post-cards.hot :post="$post" />
                    @endforeach
                </div>

                @if ($hot->count() > 3)
                    <x-post-cards.section-cta link="posts.hot">
                        💫 Explore More 💫
                    </x-post-cards.section-cta>
                @endif
            </section>
        @endif

        @if (isset($posts) && $posts)
            <section>
                <div class="space-y-4 gap-2 md:px-8 xl:px-0  xl:grid grid-cols-2">
                    <x-h2>All Posts</x-h2>
                    <p>There are {{ $post_count }} posts here</p>
                    @foreach ($posts->take(8) as $post)
                        <x-post-cards.card-x :post="$post" />
                    @endforeach
                </div>
                @if ($posts->count() > 8)
                    <x-post-cards.section-cta link="posts.all">
                        💫 See All Posts 💫
                    </x-post-cards.section-cta>
                @endif
            </section>
        @else
            <p>No posts yet. stay tuned for upcoming posts.</p>
        @endif


    </main>


</x-app-layout>
