<div>
    <x-form.label label-for="admin_filter" label="Authors" />
    <x-select for-name="admin_filter" for-id="admin_filter" for-title="Authors">
        <option value="">
            All
        </option>

        @foreach ($authors as $author)
            <option value="{{ $author['id'] }}"
                {{ request()->input('admin_filter') == $author['id'] ? 'selected' : '' }}>
                {{ $author['name'] }}
            </option>
        @endforeach
    </x-select>
</div>
