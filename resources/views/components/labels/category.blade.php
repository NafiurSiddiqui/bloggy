@props(['category' => null, 'sm' => false, 'no-href' => false])


@if (isset($category) && $category != null)
    <x-labels.layout url="categories/{{ $category->slug }}" :sm="$sm" no-href="{{ isset($noHref) }}">
        {{ $category->title }}
    </x-labels.layout>
@endif
