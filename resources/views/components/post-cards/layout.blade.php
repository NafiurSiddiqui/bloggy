<article
    {{ $attributes->merge([
        'class' => 'transition-colors duration-300 hover:bg-gray-100  dark:hover:bg-gray-900 rounded-xl  py-6 px-5',
    ]) }}>
    {{ $slot }}
</article>
