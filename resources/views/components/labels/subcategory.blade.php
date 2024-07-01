@props(['category' => null, 'subcategory' => null, 'sm' => false])


@if (isset($subcategory) && isset($category) && ($category !== null && $subcategory !== null))
    <x-labels.layout url="categories/{{ $category->slug }}/{{ $subcategory->slug }}" :sm="$sm">
        {{ $subcategory->title }}
    </x-labels.layout>
@endif
