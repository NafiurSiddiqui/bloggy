<x-app-layout>
    All posts!

    @foreach ($allPosts as $post)
        <div>{{ $post->title }}</div>
    @endforeach
</x-app-layout>
