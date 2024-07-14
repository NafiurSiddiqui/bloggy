<x-app-layout>
    {{-- <h1 class="font-semibold">Category:
        <span>{{ $category->title }}</span>
    </h1>


    @foreach ($category->posts as $post)
        <div class="border-2">
            <h1>{{ $category->title }}</h1>

            <h1>{{ $post->slug }}</h1>
            <p>{{ $post->author->name }}</p>
        </div>
    @endforeach --}}

    @if ($category->posts)
        <main class=" p-4 md:px-6 2xl:w-4/5">

            <section>
                <x-h2>Category: {{ $category->title }}</x-h2>
                {{-- <p>There are {{ $post_count }} posts here</p> --}}
                <div class="space-y-4 gap-2 md:px-8 xl:px-0  xl:grid grid-cols-2">
                    @foreach ($category->posts as $post)
                        <x-post-cards.card-x :post="$post" />
                    @endforeach
                </div>
                {{-- @if ($posts->count() > 8)
                    <x-post-cards.section-cta link="posts.all">
                        💫 See All Posts 💫
                    </x-post-cards.section-cta>
                @endif --}}
            </section>
        @else
            <p>No posts yet. stay tuned for upcoming posts.</p>
    @endif
    </main>
</x-app-layout>
