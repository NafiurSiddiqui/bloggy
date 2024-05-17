{{-- Not working as expected. Either need a custom filter dropdown or somethng else. --}}

<x-select for-name="category_filter" for-id="category_filter" for-title="filter by categories">
    <option value="all">
        <a href="/admin/subcategories">All</a>
    </option>


    @foreach ($categories as $category)
        <option value="{{ $category->slug }}">
            <a href="/admin/subcategories?filter[slug]={{ $category->slug }}">
                {{ $category->title }}
            </a>
        </option>
    @endforeach
</x-select>
