<x-layout>
    @foreach($categories as $category)

        <div>
            Cateogory: {{ $category->name}}
        </div>
    @endforeach
</x-layout>
