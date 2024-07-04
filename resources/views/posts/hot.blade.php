<x-app-layout>
    All the hot posts!

    @foreach ($hotPosts as $post)
        <div>{{ $post->title }}</div>
    @endforeach
</x-app-layout>
