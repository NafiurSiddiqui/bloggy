@props(['href'])

<a href="{{ isset($href) ? $href : '#' }}" class="text-sm text-gray-900 hover:text-blue-500 hover:underline">
    {{ $slot }}
</a>
