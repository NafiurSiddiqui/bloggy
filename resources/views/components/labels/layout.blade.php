@props(['url', 'sm' => false, 'no-href' => false])



@if (isset($noHref) && $noHref)
    <div
        class="inline-block bg-zinc-50/80 border text-center text-slate-700 font-semibold {{ $sm ? 'text-xs px-2' : 'text-sm px-4' }}  py-1 rounded-full min-w-4 ">
        {{ $slot }}
    </div>
@else
    <a href="{{ $url }}"
        class="inline-block bg-zinc-50/80 border text-center text-slate-700 hover:bg-neutral-300/30 transition-colors font-semibold {{ $sm ? 'text-xs px-2' : 'text-sm px-4' }}  py-1 rounded-full min-w-4 dark:bg-gray-800 dark:hover:bg-gray-700">
        {{ $slot }}
    </a>
@endif
