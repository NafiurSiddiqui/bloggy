@props(['post'])


<a href="/post/{{ $post->slug }}"
    {{ $attributes->merge([
        'class' => 'text-4xl text-left font-bold dark:text-darkText-100 text-lightText-700
                            hover:text-emerald-500 dark:hover:text-darkTextHover-600 hoverTextEffect transition-all duration-300 ease-in-out mb-6 hover:underline dark:active:text-emerald-500 block text-center',
    ]) }}>
    <h3>
        {!! Str::limit($post->title, 200, '...') !!}
    </h3>
</a>
