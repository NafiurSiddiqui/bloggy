@props(['link' => false, 'href' => ''])

@if ($link)
    <a href="{{ $href }}"
        {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-zinc-50 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-600 hover:border-lightText-600 rounded-sm font-semibold text-sm text-zinc-700 hover:text-white dark:text-zinc-300 font-text dark:hover:text-emerald-100  shadow-sm hover:bg-lightText-500 dark:hover:bg-darkBlack dark:hover:border-zinc-700  focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 disabled:opacity-25 transition ease-in-out duration-150 text-center']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex  justify-center px-4 py-2 bg-zinc-50 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-600 hover:border-lightText-600 rounded-sm  font-semibold text-sm text-zinc-700 hover:text-white  dark:text-zinc-300 font-text dark:hover:text-emerald-100  shadow-sm hover:bg-lightText-500 dark:hover:bg-darkBlack  dark:hover:border-zinc-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 disabled:opacity-25 transition ease-in-out duration-150 text-center']) }}>
        {{ $slot }}
    </button>
@endif
