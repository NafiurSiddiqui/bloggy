<x-app-layout>
    All the featured posts!

    @foreach ($featuredPosts as $post)
        <div>{{ $post->title }}</div>
    @endforeach
</x-app-layout>
