{{-- show posts by category, subcategory, author, etc --}}
@props([
    'posts',
    'category' => null,
    'subcategory' => null,
    'author' => null,
    'header' => false,
    'title' => false,
    'no-href-author',
    'no-href-category',
])


@if ($posts->isNotEmpty())
    <main class=" p-4 md:px-6 2xl:w-4/5">
        <section>
            @if (isset($subcategory))
                <x-h2>
                    <a href="/categories/{{ $subcategory->category->slug }}"
                        class="hover:text-gray-700 hover:underline">{{ $subcategory->category->title }}</a>/
                    {{ $subcategory->title }}
                    <span class="!text-gray-500 !text-lg">({{ $posts->count() }}
                        posts)</span>
                </x-h2>
            @else
                <x-h2>{{ $header ? ucwords($header) : 'Header here' }}:
                    {{ isset($title) ? $title : 'Title here' }} <span
                        class="!text-gray-500 !text-lg">({{ $posts->count() }}
                        posts)</span></x-h2>
            @endif



            <div class="space-y-4 lg:space-y-0 gap-2 lg:gap-4 md:px-8 xl:px-0 xl:grid grid-cols-2">
                @foreach ($posts as $post)
                    <x-post-cards.card-x :no-href-author="isset($noHrefAuthor)" :no-href-category="isset($noHrefCategory)" :post="$post" />
                @endforeach
            </div>
        </section>
    @else
        <p>No posts yet. stay tuned for upcoming posts.</p>
@endif
</main>
