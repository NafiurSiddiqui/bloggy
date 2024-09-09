@props(['lg' => false, 'sm' => false, 'featured' => false, 'noBorder' => false])

<div {{ $attributes->merge([
    'class' =>
        'rounded-full p-2 overflow-hidden flex justify-center items-center' .
        ($noBorder ? ' border-none' : ' border border-zinc-400 dark:border-zinc-700/30') .
        ($featured ? ' dark:bg-darkPostCard/40' : ' dark:bg-darkPostCard') .
        (($lg ? ' w-16 h-16' : $sm) ? ' w-8 h-8' : ' w-12 h-12'),
]) }}
    aria-label="user avatar">
    @if ($lg)
        <i class="group-hover:text-zinc-500 fa-solid fa-user text-zinc-300 dark:text-emerald-100/30 w-full h-full"></i>
    @elseif($sm)
        <i class="group-hover:text-zinc-500 fa-solid fa-user text-zinc-400 dark:text-emerald-100/30 w-full h-full"></i>
    @else
        <i class="group-hover:text-zinc-500 fa-solid fa-user text-zinc-300 dark:text-emerald-100/30 w-full h-full"></i>
    @endif
</div>
