<x-app-layout>
    <h1 class="font-semibold">Category:
        <span>{{ $category->title }}</span>
    </h1>


    @foreach ($category->posts as $post)
        <div class="border-2">
            <h1>{{ $category->title }}</h1>

            <h1>{{ $post->slug }}</h1>
            <p>{{ $post->author->name }}</p>
        </div>
    @endforeach
</x-app-layout>
