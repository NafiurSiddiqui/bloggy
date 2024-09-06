@props(['route', 'active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-emerald-700 dark:border-emerald-600 text-start text-base font-medium text-indigo-700 dark:text-gray-200 bg-indigo-50 dark:bg-darkTextHover-600/10 focus:outline-none focus:text-emerald-800 dark:focus:text-emerald-200 focus:bg-emerald-100 dark:focus:bg-emerald-900 focus:border-emerald-700 dark:focus:border-emerald-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-800 dark:hover:text-zinc-200 hover:bg-stone-50 dark:hover:bg-darkTextHover-600/10 hover:border-emerald-300 dark:hover:border-emerald-600 focus:outline-none focus:text-zinc-800 dark:focus:text-zinc-200 focus:bg-zinc-50 dark:focus:bg-emerald-700 focus:border-emerald-300 dark:focus:border-emerald-600 transition duration-150 ease-in-out';
@endphp

<li class="">
    {{-- <a href="{{ isset($route) ? $route : '#' }}"
        class="block w-full ps-3 pe-4 py-2 border-l-4 border-emerald-700 dark:border-emerald-600 text-start text-base font-medium text-indigo-700 dark:text-gray-200 bg-indigo-50 dark:bg-darkTextHover-600/10 focus:outline-none focus:text-emerald-800 dark:focus:text-emerald-200 focus:bg-emerald-100 dark:focus:bg-emerald-900 focus:border-emerald-700 dark:focus:border-emerald-300 transition duration-150 ease-in-out">{{ $slot }}</a> --}}
    {{-- <a href="{{ isset($route) ? $route : '#' }}"
        class="text-stone-500  hover:text-gray-600 hover:bg-stone-200 dark:hover:text-gray-200 hover:dark:bg-darkBlack font-bold focus:outline-none focus:text-stone-700 p-2 w-full inline-block rounded-sm {{ isset($active) && $active ? 'bg-stone-200 text-stone-600 dark:bg-' : '' }}">{{ $slot }}</a> --}}
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
