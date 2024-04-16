{{--@props(['category','subcategory'])--}}

{{--<a href="#" class="inline-block bg-gray-300 text-center py-1 px-4 rounded-full min-w-4">--}}
{{--    {{--}}
{{--    $category? $category->name : $subcategory->name--}}
{{--}}--}}
{{--</a>--}}

{{--@props(['category' => null, 'subcategory' => null])--}}

{{--<a href="#" class="inline-block bg-gray-300 text-center py-1 px-4 rounded-full min-w-4">--}}
{{--    {{ $subcategory->name ?? ($category ? $category->name : 'N/A') }}--}}
{{--</a>--}}

@props(['category' => null, 'subcategory' => null])

@if(isset($subcategory) || isset($category))
    <a href="#" class="inline-block bg-gray-300 text-center py-1 px-4 rounded-full min-w-4">
        {{ $subcategory->name ?? $category->name }}
    </a>
@endif

{{--@props(['category'])--}}

{{--<a href="/?category={{ $post->category->slug }}"--}}
{{--   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"--}}
{{--   style="font-size: 10px">--}}
{{--    {{ $post->category->name }}--}}
{{--</a>--}}
