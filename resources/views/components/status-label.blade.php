@props(['post'])

{{-- 1 = Boolean --}}
@switch(1)
    @case($post->is_draft)
        <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-zinc-100 dark:bg-zinc-200/20 dark:text-zinc-200 text-zinc-800">
            Draft </span>
    @break

    @case($post->is_unpublished)
        <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800 dark:bg-orange-200/20 dark:text-orange-100">
            Unpublished </span>
    @break

    @case($post->is_published)
        <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 dark:bg-emerald-200/20 text-emerald-800 dark:text-emerald-100">
            Published </span>
    @break

    @default
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-100 text-slate-800">
            ?? </span>
@endswitch
