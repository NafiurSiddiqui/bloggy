@props(['sort-by', 'th-title', 'page'])

@php
    $sortAsc = isset($sortBy) && request()->has('sort') && request('dir') == 'asc';

    $sortDesc = isset($sortBy) && request()->has('sort') && request('dir') == 'desc';

    $isPostsHomePage = empty(request()->query());

@endphp


<th scope="col"
    class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider hover:bg-gray-100 hover:text-gray-500 cursor-pointer border-x border-x-gray-200">
    <div class="{{ isset($sortBy) ? '' : 'py-3' }} px-2 flex justify-between">
        @if ($sortAsc)
            <a href="/admin/{{ $page }}/?sort=-{{ $sortBy }}&dir=desc"
                class=" py-3 w-full inline-block h-9 text-center">
                {{ $thTitle }}
            </a>
        @elseif(isset($sortBy))
            <a href="/admin/{{ $page }}/?sort={{ $sortBy }}&dir=asc"
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
