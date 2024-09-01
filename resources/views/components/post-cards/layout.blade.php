<article
    {{ $attributes->merge([
        'class' => 'transition-colors duration-300  dark:bg-darkHotCard   py-6 px-5',
    ]) }}>
    {{ $slot }}
</article>
