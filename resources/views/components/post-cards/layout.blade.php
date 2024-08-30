<article
    {{ $attributes->merge([
        'class' => 'transition-colors duration-300 hover:bg-gray-50  dark:hover:bg-gray-900 py-6 px-5',
    ]) }}>
    {{ $slot }}
</article>
