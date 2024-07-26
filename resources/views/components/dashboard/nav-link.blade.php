@props(['route', 'active'])


<li class="">
    <a href="{{ isset($route) ? $route : '#' }}"
        class="text-stone-500  hover:text-gray-600 hover:bg-stone-200 font-bold focus:outline-none focus:text-stone-700 p-2 w-full inline-block rounded-sm {{ isset($active) && $active ? 'bg-stone-200 text-stone-600' : '' }}">{{ $slot }}</a>
</li>
