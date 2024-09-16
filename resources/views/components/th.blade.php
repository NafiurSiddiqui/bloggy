@props(['sort-by', 'th-title', 'page'])

@php
    $sortAsc = isset($sortBy) && request()->has('sort') && request('dir') == 'asc';

    $sortDesc = isset($sortBy) && request()->has('sort') && request('dir') == 'desc';

    $isPostsHomePage = empty(request()->query());

@endphp


<th scope="col"
    class="text-left text-xs font-medium text-lightText-500 uppercase tracking-wider hover:bg-gray-100 hover:text-lightText-500 cursor-pointer border-x border-x-gray-200 dark:bg-darkPostCard dark:text-zinc-300 dark:border-zinc-700 dark:hover:bg-darkBlack dark:hover:text-zinc-200 first:border-l-0 last:border-r-0">
    <div class="{{ isset($sortBy) ? '' : 'py-3' }} px-2 flex justify-between">
        @if ($sortDesc)
            <a href="/admin/{{ $page }}/?sort={{ $sortBy }}&dir=asc&{{ http_build_query(request()->except(['sort', 'dir'])) }}"
                class=" py-3 w-full inline-block h-9 text-center">
                {{ $thTitle }}
            </a>
        @elseif(isset($sortBy))
            <a href="/admin/{{ $page }}/?sort={{ $sortBy }}&dir=desc&{{ http_build_query(request()->except(['sort', 'dir'])) }}"
                class=" py-3 w-full inline-block  h-9 text-center">
                {{ $thTitle }}
            </a>
        @else
            {{ $thTitle }}
        @endif

        @if (isset($sortBy))
            <div class ="flex flex-col items-center justify-center text-gray-400">
                <i class="fa-solid fa-sort"></i>
            </div>
        @endif
    </div>
</th>
