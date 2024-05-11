<x-app-layout>
    <h1>Posts by: {{ $posts[0]->author->name }}</h1>
    @foreach ($posts as $post)
        <p>{{ $post->title }}</p>
    @endforeach
</x-app-layout>
