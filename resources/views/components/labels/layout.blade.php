@props(['url', 'sm' => false])

<a href="{{ $url }}"
    class="inline-block bg-zinc-50/80 border text-center text-slate-700 hover:bg-neutral-300/90 transition-colors font-semibold {{ $sm ? 'text-xs px-2' : 'text-sm px-4' }}  py-1 rounded-full min-w-4 dark:bg-gray-800 dark:hover:bg-gray-700">
    {{ $slot }}
</a>
