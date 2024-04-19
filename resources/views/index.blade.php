<x-layout>
    <main class="borderTest">
            @if($featured)
            <section>
                Featured Posts
{{--                {{count($featured)}}--}}
                @foreach($featured as $post)
                    <x-post-card :post="$post" />
                @endforeach

            </section>
            @endif
        @if($hot)
        <section>
            Hot
            @foreach($hot as $post)
                <x-post-card :post="$post" />
            @endforeach
        </section>
        @endif
        @if($posts)

        <section>
                        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                            <h1 class="text-2xl font-bold">All Posts</h1>
                            <p>There are {{$post_count}} posts here</p>
                            @foreach ($posts as $post)
                                <x-post-card :post="$post"/>

                        </div>
                        @endforeach

                    </section>
        @endif


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
