@props(['formAction', 'isPostsPage' => false])

{{-- @foreach ($status as $stat)
    Name: {{ $stat['title'] }}
@endforeach --}}

<form id="filterByStatus" name="filterByStatus" method="get">
    <x-form.label label-for="status_filter" label="Filter by status" />
    <x-select onchange="submitFilterByStatus(event)" for-name="status_filter" for-id="status_filter"
        for-title="filter by status">
        <option value="all">
            All
        </option>

        @foreach ($status as $stat)
            <option value="{{ $stat['slug'] }}">
                {{ $stat['title'] }}
            </option>
        @endforeach
    </x-select>
</form>


<script>
    // function submitForm() {

    //     var form = document.getElementById('filterByStatus');
    //     // var select = document.getElementById('statusFilter');
    //     // var selectedValue = select.options[select.selectedIndex].value;
    //     form.submit();


    //     // Construct the URL with the correct query parameter format
    //     // var url = selectedValue === 'all' ? '/admin/posts' : '/admin/posts?filter[status]=' +
    //     //     encodeURIComponent(selectedValue);

    //     // Redirect to the constructed URL
    //     // window.location.href = url;
    // }
    function submitFilterByStatus(event) {
        event.preventDefault()
        var selectedStatus = document.getElementById('status_filter').value;
        var currentUrl = new URL(window.location.href);
        var categoryFilter = currentUrl.searchParams.get('filter[slug]');

        // Construct the URL with both parameters
        currentUrl.searchParams.set('filterByStatus', selectedStatus);
        if (categoryFilter) { // Add category filter if available
            currentUrl.searchParams.set('filter[slug]', categoryFilter);
        }
        // console.log(currentUrl);
        window.location.href = currentUrl.toString();
    }
</script>
