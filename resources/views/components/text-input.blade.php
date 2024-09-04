@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:bg-zinc-800 dark:text-gray-200 dark:border-zinc-700 focus:border-emerald-500 dark:focus:border-emerald-500 focus:ring-emerald-300 dark:focus:ring-emerald-500 shadow-sm',
]) !!}>
