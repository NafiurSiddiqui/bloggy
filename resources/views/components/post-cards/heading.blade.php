@props(['post'])

<a href="/post/{{ $post->slug }}">
    <h3
        {{ $attributes->merge([
            'class' =>
                'text-4xl text-left font-bold dark:text-darkText-100 dark:hover:text-darkTextHover-600 hover:tracking-[0.4px] transition-all duration-300 ease-in-out mb-6',
        ]) }}>
        {{ $post->title }}
    </h3>
</a>
