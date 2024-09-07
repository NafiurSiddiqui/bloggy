@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-900  border-b-2 border-emerald-300 dark:border-emerald-600/30 
            dark:text-gray-200 dark:bg-darkBlack/30 
            dark:hover:bg-darkBlack
            focus:outline-none focus:border-emerald-600 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-4 py-2  text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-800 
            dark:hover:text-gray-200 hover:dark:bg-darkBlack  
            hover:bg-lightWhite
            hover:border-gray-300  focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-emerald-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
