@props(['url', 'sm' => false])

<a href="{{ $url }}"
    class="inline-block bg-gray-200 text-center text-gray-600 hover:bg-gray-300 transition-colors font-semibold {{ $sm ? 'text-xs px-2' : 'text-sm px-4' }}  py-1 rounded-full min-w-4 dark:bg-gray-800 dark:hover:bg-gray-700">
    {{ $slot }}
</a>
