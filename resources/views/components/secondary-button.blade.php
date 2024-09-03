@props(['link' => false, 'href' => ''])

@if ($link)
    <a href="{{ $href }}"
        {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-white dark:bg-transparent border border-zinc-300 dark:border-zinc-500 rounded-sm font-semibold text-sm text-zinc-700  hover:text-zinc-500 dark:text-zinc-300 dark:hover:text-emerald-100  tracking-widest shadow-sm hover:bg-zinc-50 dark:hover:bg-darkNavFooter dark:hover:border-zinc-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 disabled:opacity-25 transition ease-in-out duration-150 text-center']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex  justify-center px-4 py-2 bg-white dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-500 rounded-sm  font-semibold text-sm text-zinc-700 hover:text-zinc-500  dark:text-zinc-300 dark:hover:text-emerald-100  tracking-widest shadow-sm hover:bg-zinc-50 dark:hover:bg-darkNavFooter  dark:hover:border-zinc-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 disabled:opacity-25 transition ease-in-out duration-150 text-center ']) }}>
        {{ $slot }}
    </button>
@endif
