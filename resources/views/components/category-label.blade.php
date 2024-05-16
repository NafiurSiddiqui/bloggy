@props(['category' => null, 'subcategory' => null])


@if ($subcategory == null && isset($category) && $category != null)
    <a href="categories/{{ $category->slug }}"
        class="inline-block bg-gray-300 text-center py-1 px-4 rounded-full min-w-4 dark:bg-gray-800 dark:hover:bg-gray-700">
        {{ $category->title }}
    </a>
@elseif($subcategory != null && $category != null)
    <a href="categories/{{ $category->slug }}/{{ $subcategory->slug }}"
        class="inline-block bg-gray-300 text-center py-1 px-4 rounded-full min-w-4 dark:bg-gray-800 dark:hover:bg-gray-700">

        {{ $subcategory->title }}
    </a>
@endif
