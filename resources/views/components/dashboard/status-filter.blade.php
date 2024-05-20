{{-- @props(['formAction', 'isPostsPage' => false]) --}}


<form action="#" id="filterByStatus" name="filterByStatus" method="get" data-is-posts-page={{ $isPostsPage }}>
    <x-form.label label-for="filterByStatus" label="Filter by Category" />
    <x-select onchange="submitFormWithSelectedUrl()" for-name="category_filter" for-id="category_filter"
        for-title="filter by categories">
        <option value="all">
            All
        </option>

        @foreach ($categories as $category)
            <option value="{{ $category?->slug }}" {{ $currentCategory?->slug == $category->slug ? 'selected' : '' }}>
                {{ $category->title }}
            </option>
        @endforeach
    </x-select>
</form>


<script>
    function submitFormWithSelectedUrl() {

        var form = document.getElementById('filterByStatus');
        var select = document.getElementById('category_filter');
        var selectedValue = select.options[select.selectedIndex].value;
        const isPostsPage = form.dataset.isPostsPage;


        // Construct the URL with the correct query parameter format
        var url = selectedValue === 'all' ? '/admin/subcategories' : (isPostsPage ?
                '/admin/posts?filter[slug]=' : '/admin/subcategories?filter[slug]=') +
            encodeURIComponent(selectedValue);

        // Redirect to the constructed URL
        window.location.href = url;
    }
</script>
