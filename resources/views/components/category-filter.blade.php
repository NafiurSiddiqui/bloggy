@props(['formAction', 'isPostsPage' => false])



@if (isset($formAction))

    <form x-data="{ selectedOption: '' }" action="{{ $formAction }}" id="filterByCategory" name="filterByCategory" method="get"
        data-is-posts-page={{ $isPostsPage }} @submit.prevent="submitForm">
        <x-form.label label-for="filter[slug]" label="Filter by Category" />
        <x-select for-name="filter[slug]" for-id="filter[slug]" for-title="filter by categories"
            x-on:change="submitForm()">
            <option value="">
                All
            </option>

            @foreach ($categories as $category)
                <option value="{{ $category?->slug }}"
                    {{ $currentCategory?->slug == $category->slug ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
            @endforeach
        </x-select>
    </form>
@else
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
@endif


<script>
    function submitForm() {
        document.getElementById('filterByCategory').submit();
    }
</script>
