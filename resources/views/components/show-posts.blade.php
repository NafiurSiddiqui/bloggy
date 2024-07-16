{{-- show posts by category, subcategory, author, etc --}}
@props(['posts', 'category' => null, 'subcategory' => null, 'author' => null, 'header' => false, 'title' => false])


@if ($posts->isNotEmpty())
    <main class=" p-4 md:px-6 2xl:w-4/5">
        <section>

            <x-h2>

                @if (isset($subcategory))
                    <a href="/categories/{{ $subcategory->category->slug }}"
                        class="hover:text-gray-700 hover:underline">{{ $subcategory->category->title }}</a>/
                    {{ $subcategory->title }}
                    <span class="!text-gray-500 !text-lg">({{ $posts->count() }}
                        posts)</span>
                @else
                    <x-h2>{{ $header ? ucwords($header) : 'Header here' }}:
                        {{ isset($title) ? $title : 'Title here' }} <span
                            class="!text-gray-500 !text-lg">({{ $posts->count() }}
                            posts)</span></x-h2>
                @endif

            </x-h2>

            <div class="space-y-4 lg:space-y-0 gap-2 lg:gap-4 md:px-8 xl:px-0 xl:grid grid-cols-2">
                @foreach ($posts as $post)
                    <x-post-cards.card-x no-href :post="$post" />
                @endforeach
            </div>
        </section>
    @else
        <p>No posts yet. stay tuned for upcoming posts.</p>
@endif
</main>
