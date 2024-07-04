@props(['link'])

<div class="text-center mt-4">
    <a href="{{ route($link) }}"
        class="text-zinc-600 hover:text text-xl
                    -zinc-800 font-semibold underline italic">
        {{ $slot }}
    </a>
</div>
