@props(['formAction', 'isPostsPage' => false])



@if (isset($formAction))

    <form x-data="{ selectedOption: '' }" action="{{ $formAction }}" id="filterByCategory" name="filterByCategory" method="get"
        data-is-posts-page={{ $isPostsPage }} @submit.prevent="submitForm">
        <x-form.label label-for="filter[slug]" label="Category" />
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
    <div>
        <x-form.label label-for="category_filter" label="Category" />
        <x-select for-name="category_filter" for-id="category_filter" for-title="filter by categories">
            <option value="">
                All
            </option>

            @foreach ($categories as $category)
                <option value="{{ $category?->id }}" {{ $currentCategory?->id == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
            @endforeach
        </x-select>
    </div>
@endif


<script>
    function submitForm() {
        document.getElementById('filterByCategory').submit();
    }
</script>
