@props(['link' => false, 'href' => ''])

@if ($link)
    <a href="{{ $href }}"
        {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-500 px-10 py-3 font-semibold rounded text-white mt-4 uppercase hover:bg-blue-600 text-sm']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-500 px-10 py-3 font-semibold rounded text-white mt-4 uppercase hover:bg-blue-600 text-sm']) }}>
        {{ $slot }}
    </button>
@endif
