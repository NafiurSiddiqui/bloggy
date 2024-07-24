<x-app-layout>

    <x-show-posts :posts="$posts" header="All Posts" :pagination-items="$posts" />
    {{-- <x-paginaton-holder :item="$posts" /> --}}

</x-app-layout>
