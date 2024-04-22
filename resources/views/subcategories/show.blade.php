<x-app-layout>
{{--    @dd($subcategory)--}}
    <h1>{{$category->name}}/{{ $subcategory->name }}</h1>

    {{$subcategory}}
</x-app-layout>
