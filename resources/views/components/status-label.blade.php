@props(['post'])


@switch(1)
    @case($post->is_draft)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
            Draft </span>
    @break

    @case($post->is_unpublished)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
            Unpublished </span>
    @break

    @case($post->is_published)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
            Published </span>
    @break

    @default
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-100 text-slate-800">
            Bizzare </span>
@endswitch
