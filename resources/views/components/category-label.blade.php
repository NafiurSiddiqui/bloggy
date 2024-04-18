@props(['category' => null, 'subcategory' => null])

@if(isset($category) || $category != null)
    <a href="categories/{{$category->slug}}" class="inline-block bg-gray-300 text-center py-1 px-4 rounded-full min-w-4">
        {{ $category->name}}
    </a>
@elseif(isset($subcategory) || $subcategory != null)
    <a href="#" class="inline-block bg-gray-300 text-center py-1 px-4 rounded-full min-w-4">
        {{$subcategory->name}}
    </a>
@endif
