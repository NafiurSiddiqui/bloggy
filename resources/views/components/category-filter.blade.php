{{-- @props(['formAction', 'isPostsPage' => false]) --}}

{{-- 
<form action="{{ $formAction }}" id="filterByCategory" name="filterByCategory" method="get"
    data-is-posts-page={{ $isPostsPage }}> --}}
<x-form.label label-for="filter[slug]" label="Filter by Category" />
<x-select for-name="filter[slug]" for-id="filter[slug]" for-title="filter by categories">
    <option value="">
        All
    </option>

    @foreach ($categories as $category)
        <option value="{{ $category?->slug }}" {{ $currentCategory?->slug == $category->slug ? 'selected' : '' }}>
            {{ $category->title }}
        </option>
    @endforeach
</x-select>
{{-- </form> --}}
