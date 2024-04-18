<x-layout>
    @foreach($category->posts as $post)

        <div>
            {{ $post->slug}}
        </div>
    @endforeach
</x-layout>
