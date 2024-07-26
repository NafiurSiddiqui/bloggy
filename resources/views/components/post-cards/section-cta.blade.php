@props(['link'])

<div class="text-center mt-4">
    <a href="{{ route($link) }}" class="text-zinc-600 text-xl hover:text-zinc-700 font-semibold underline italic">
        {{ $slot }}
    </a>
</div>
