@props(['formAction', 'isPostsPage' => false])
{{-- You may not need this if the separate category-filter.blade works out under one form technique --}}

<form action="{{ $formAction }}" id="filterByCategory" name="filterByCategory" method="get"
    data-is-posts-page={{ $isPostsPage }}>
    <x-form.label label-for="filterByCategory" label="Filter by Category" />
    <x-select onchange="submitFilterByCategory(event);" for-name="category_filter" for-id="category_filter"
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
    // function submitFilterByCategory() {

    //     var form = document.getElementById('filterByCategory');
    //     var select = document.getElementById('category_filter');
    //     var selectedValue = select.options[select.selectedIndex].value;
    //     const isPostsPage = form.dataset.isPostsPage;
    //     // Construct the URL with the correct query parameter format
    //     var url = selectedValue === 'all' ? '/admin/subcategories' : (isPostsPage ?
    //             '/admin/posts?filter[slug]=' : '/admin/subcategories?filter[slug]=') +
    //         encodeURIComponent(selectedValue);
    //     console.log(url);
    //     // Redirect to the constructed URL
    //     window.location.href = url;
    // }

    function submitFilterByCategory(event) {
        event.preventDefault();
        var selectedCategory = document.getElementById('category_filter').value;
        var currentUrl = new URL(window.location.href);
        var statusFilter = currentUrl.searchParams.get('filterByStatus');
        // Construct the URL with both parameters
        // const res = currentUrl.searchParams.set('filter[slug]', selectedCategory);
        currentUrl.searchParams.set('filter[slug]', decodeURIComponent(selectedCategory));


        if (statusFilter) { // Add status filter if available
            currentUrl.searchParams.set('filterByStatus', decodeURIComponent(selectedCategory));

        } else {
            currentUrl.searchParams.delete('filterByStatus'); // Remove if no status filter
        }

        console.log(currentUrl);
        window.location.href = currentUrl.toString();

    }
</script>
</script>
