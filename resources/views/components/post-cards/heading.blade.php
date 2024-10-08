@props(['post'])


<a href="/post/{{ $post->slug }}"
    {{ $attributes->merge([
        'class' =>
            'text-2xl sm:text-3xl md:text-4xl text-left font-bold dark:text-darkText-100 text-lightText-800 hover:text-emerald-500 font-header dark:hover:text-darkTextHover-600 hoverTextEffect transition-all duration-300 ease-in-out hover:underline dark:active:text-emerald-500 block my-6',
    ]) }}>
    <h3>
        {!! Str::limit($post->title, 200, '...') !!}
    </h3>
</a>
