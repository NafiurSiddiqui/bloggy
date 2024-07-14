@props(['category' => null, 'subcategory' => null, 'sm' => false])


@if (isset($subcategory) && isset($category) && ($category !== null && $subcategory !== null))
    <x-labels.layout
        url="{{ http_build_query(request()->except('categories', 'page')) }}/categories/{{ $category->slug }}/{{ $subcategory->slug }}"
        :sm="$sm">
        {{ $subcategory->title }}
    </x-labels.layout>
@endif
