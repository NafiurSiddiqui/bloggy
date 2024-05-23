@props(['formAction', 'isPostsPage' => false])


<div class="flex-grow-0">
    <x-form.label label-for="status_filter" label="Status" />
    <x-select for-name="status_filter" for-id="status_filter" for-title="filter by status">
        <option value="">
            All
        </option>

        @foreach ($status as $stat)
            <option value="{{ $stat['slug'] }}"
                {{ request()->input('status_filter') === $stat['slug'] ? 'selected' : '' }}>
                {{ $stat['title'] }}
            </option>
        @endforeach
    </x-select>
</div>
