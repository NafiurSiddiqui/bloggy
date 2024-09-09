@props(['href', 'highlight' => false, 'noUnderline' => false])


<a href="{{ isset($href) ? $href : '#' }}"
    {{ $attributes->merge([
        'class' =>
            'text-sm transition-colors duration-75 p-0  hover:text-darkTextHover-600 hoverTextEffect hover:text-emerald-500' .
            ($noUnderline ? ' no-underline' : ' underline') .
            ($highlight ? ' dark:text-darkTextHover-600 dark:hover:text-emerald-400' : ' text-zinc-400'),
    ]) }}>
    {{ $slot }}
</a>
