@props(['url', 'sm' => false, 'no-href' => false])



@if (isset($noHref) && $noHref)
    <div
        class="inline-block bg-zinc-50/80 text-center text-slate-700 font-semibold {{ $sm ? 'text-xs px-2' : 'text-sm px-4' }}  py-1 min-w-4 ">
        {{ $slot }}
    </div>
@else
    <a href="{{ $url }}"
        class="inline-block bg-zinc-50/80 text-center dark:text-slate-200 hover:bg-neutral-300/30 transition-colors font-semibold {{ $sm ? 'text-xs px-2' : 'text-sm px-4' }}  py-1 min-w-4 dark:bg-darkLabel dark:hover:bg-gray-700">
        {{ $slot }}
    </a>
@endif
