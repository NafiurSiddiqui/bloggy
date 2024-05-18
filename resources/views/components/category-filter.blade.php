<form action="/admin/subcategories" id="filterByCategory" name="filterByCategory" method="get">
    <x-form.label label-for="filterByCategory" label="Filter by Category" />
    <x-select onchange="submitFormWithSelectedUrl()" for-name="category_filter" for-id="category_filter"
        for-title="filter by categories">
        <option value="all">
            <a href="/admin/subcategories">All</a>
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
        var form = document.getElementById('filterByCategory');
        var select = document.getElementById('category_filter');
        var selectedValue = select.options[select.selectedIndex].value;
        // console.log(select);
        // Construct the URL with the correct query parameter format
        var url = selectedValue === 'all' ? '/admin/subcategories' : '/admin/subcategories?filter[slug]=' +
            encodeURIComponent(selectedValue);

        // Redirect to the constructed URL
        window.location.href = url;
    }
</script>
