<article
    {{ $attributes->merge([
        'class' =>
            'transition-colors duration-300 border dark:border-zinc-700 bg-lightWhite dark:bg-darkPostCard py-6 px-5',
    ]) }}>
    {{ $slot }}
</article>
