@props(['formAction', 'isPostsPage' => false])

{{-- @foreach ($status as $stat)
    Name: {{ $stat['title'] }}
@endforeach --}}

{{-- <form id="filterByStatus" name="filterByStatus" method="get"> --}}
<x-form.label label-for="status_filter" label="Filter by status" />
<x-select for-name="status_filter" for-id="status_filter" for-title="filter by status">
    <option value="">
        All
    </option>

    @foreach ($status as $stat)
        <option value="{{ $stat['slug'] }}" {{ request()->input('status_filter') === $stat['slug'] ? 'selected' : '' }}>
            {{ $stat['title'] }}
        </option>
    @endforeach
</x-select>
{{-- </form> --}}
