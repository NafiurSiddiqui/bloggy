@props(['post'])

<a href="/post/{{ $post->slug }}">
    <h3 {{ $attributes->merge([
        'class' => 'text-4xl text-center font-bold text-gray-800',
    ]) }}>
        {{ $post->title }}
    </h3>
</a>
