@props(['category' => null, 'sm' => false])


@if (isset($category) && $category != null)
    <x-labels.layout url="categories/{{ $category->slug }}" :sm="$sm">
        {{ $category->title }}
    </x-labels.layout>
@endif
