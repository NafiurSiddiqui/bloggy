@props(['lg' => false, 'sm' => false, 'featured' => false, 'noBorder' => false])

<div class =
        'rounded-full {{ $noBorder ? 'border-none' : 'border-2 dark:border-zinc-700/30' }}  {{ $featured ? 'dark:bg-darkPostCard/40' : 'dark:bg-darkPostCard' }} p-2 {{ ($lg ? 'w-16 h-16' : $sm) ? 'w-8 h-8' : 'w-12 h-12' }} overflow-hidden flex justify-center items-center'
    aria-label="user avatar">
    @if ($lg)
        <i class="fa-solid fa-user text-emerald-100/30 w-full h-full"></i>
    @elseif($sm)
        <i class="fa-solid fa-user text-emerald-100/30 w-full h-full"></i>
    @else
        <i class="fa-solid fa-user text-emerald-100/30 w-full h-full"></i>
    @endif
</div>
