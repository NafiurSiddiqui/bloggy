@props(['lg' => false, 'sm' => false, 'featured' => false])

<div class =
        'rounded-full border-2 {{ $featured ? 'dark:bg-darkHotCard/40' : 'dark:bg-darkHotCard' }} dark:border-zinc-700/30 w-10 h-10 flex justify-center items-center',
    aria-label="user avatar">
    @if ($lg)
        <i class="fa-solid fa-user text-emerald-100/30 w-full h-full"></i>
    @elseif($sm)
        <i class="fa-solid fa-user text-emerald-100/30 w-12 h-5"></i>
    @else
        <i class="fa-solid fa-user text-emerald-100/30"></i>
    @endif
</div>
