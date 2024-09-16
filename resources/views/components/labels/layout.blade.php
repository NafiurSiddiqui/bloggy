@props(['url', 'sm' => false, 'no-href' => false])

@if (isset($noHref) && $noHref)
    <div
        class="inline-block bg-[#DEEDE8] dark:bg-darkLabel font-text dark:text-darkText-100 transition-colors text-center text-lightText-900 font-semibold {{ $sm ? 'text-xs px-2' : 'text-xs sm:text-sm px-2 sm:px-4' }}  py-1 min-w-4">
        {{ $slot }}
    </div>
@else
    <a href="{{ $url }}"
        class="inline-block bg-[#DEEDE8] hover:bg-[#d5fff1] font-text text-center dark:text-darkText-100 transition-colors text-lightText-900 font-semibold {{ $sm ? 'text-xs px-2' : 'text-xs sm:text-sm px-2 sm:px-4' }}  py-1 min-w-4 dark:bg-darkLabel dark:hover:bg-darkLabelHover dark:hover:text-white">
        {{ $slot }}
    </a>
@endif
