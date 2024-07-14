<x-app-layout>

    @if ($posts->isNotEmpty())
        <main class=" p-4 md:px-6 2xl:w-4/5">
            <section>
                <x-h2>Category: {{ $category->title }} <span
                        class="!text-gray-500 !text-lg">({{ $category->posts->count() }}
                        posts)</span></x-h2>

                <div class="space-y-4 lg:space-y-0 gap-2 lg:gap-4 md:px-8 xl:px-0 xl:grid grid-cols-2">
                    @foreach ($category->posts as $post)
                        <x-post-cards.card-x no-href :post="$post" />
                    @endforeach
                </div>

                {{-- Pagination does not work on Collection here. It always fetches the same result. --}}
                {{-- <x-pagination-holder :item="$posts" /> --}}
            </section>
        @else
            <p>No posts yet. stay tuned for upcoming posts.</p>
    @endif
    </main>
</x-app-layout>
