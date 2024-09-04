@props(['href'])

<a href="{{ isset($href) ? $href : '#' }}"
    class="dark:text-zinc-400 text-sm transition-colors duration-75 p-0 underline dark:hover:text-darkTextHover-600">
    {{ $slot }}
</a>
