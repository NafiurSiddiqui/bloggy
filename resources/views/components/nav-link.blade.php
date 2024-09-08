@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-zinc-900  border-b-2 border-emerald-300 dark:border-emerald-600/30 
            dark:text-zinc-200 dark:bg-darkBlack/30 
            dark:hover:bg-darkBlack
            focus:outline-none focus:border-emerald-600 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-zinc-500 dark:text-zinc-400 hover:text-zinc-800 
            dark:hover:text-zinc-200 hover:dark:bg-darkBlack  
            hover:bg-lightWhite
            hover:border-zinc-300  focus:outline-none focus:text-zinc-700 dark:focus:text-zinc-300 focus:border-zinc-300 dark:focus:border-emerald-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
