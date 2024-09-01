@props(['lg' => false, 'sm' => false, 'featured' => false, 'noBorder' => false])

<div class =
        'rounded-full {{ $noBorder ? 'border-none' : 'border-2 dark:border-zinc-700/30' }}  {{ $featured ? 'dark:bg-darkPostCard/40' : 'dark:bg-darkPostCard' }}  w-10 h-10 flex justify-center items-center',
    aria-label="user avatar">
    @if ($lg)
        <i class="fa-solid fa-user text-emerald-100/30 w-full h-full"></i>
    @elseif($sm)
        <i class="fa-solid fa-user text-emerald-100/30 w-12 h-5"></i>
    @else
        <i class="fa-solid fa-user text-emerald-100/30"></i>
    @endif
</div>
