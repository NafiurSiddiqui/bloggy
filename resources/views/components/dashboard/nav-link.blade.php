@props(['route', 'active'])


<li class="">
    <a href="{{ isset($route) ? $route : '#' }}"
        class="text-stone-500  hover:text-gray-600 hover:bg-gray-300 font-bold focus:outline-none focus:text-gray-300 p-2 w-full inline-block rounded-sm {{ isset($active) && $active ? 'bg-stone-200 text-stone-600' : '' }}">{{ $slot }}</a>
</li>
