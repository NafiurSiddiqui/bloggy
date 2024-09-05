@props(['link' => false, 'href' => ''])

@if ($link)
    <a href="{{ $href }}"
        {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-emerald-500 dark:bg-emerald-600 px-10 py-2 font-semibold rounded text-white mt-4 uppercase hover:bg-emerald-600 dark:hover:bg-emerald-700 text-sm hover:bg-emerald-600 dark:hover:bg-emerald-700 text-sm focus:bg-emerald-700 active:bg-emerald-900 dark:active:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-emerald-800 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => 'submit',
            'class' =>
                'bg-emerald-500 dark:bg-emerald-600 px-10 py-2 font-semibold rounded text-white mt-4 uppercase hover:bg-emerald-600 dark:hover:bg-emerald-700 text-sm focus:bg-emerald-700 active:bg-emerald-900 dark:active:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-emerald-800 transition ease-in-out duration-150',
        ]) }}>
        {{ $slot }}
    </button>
@endif
