<x-app-layout>
    {{--    @dd($subcategory) --}}
    <h1>{{ $category->title }}/{{ $subcategory->title }}</h1>

    {{ $subcategory }}
</x-app-layout>
