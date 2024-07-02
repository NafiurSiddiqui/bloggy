@props(['post'])

<a href="/post/{{ $post->slug }}">
    <h1 {{ $attributes->merge([
        'class' => 'text-4xl font-bold text-gray-800',
    ]) }}>
        {{ $post->title }}
    </h1>
</a>
