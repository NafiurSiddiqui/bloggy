@props(['category' => null, 'subcategory' => null, 'sm' => false])


@if (isset($subcategory) && isset($category) && ($category !== null && $subcategory !== null))
    <x-labels.layout
        url="{{ route('subcategory.show', [
            'categorySlug' => $category->slug,
            'subcategory' => $subcategory->slug,
        ]) }}"
        :sm="$sm">
        {{ $subcategory->title }}
    </x-labels.layout>
@endif
