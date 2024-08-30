{{-- Must set css position relative on parent element --}}

<div
    {{ $attributes->merge([
        'class' => 'bg-gradient-to-b from-gray-200/15 to-gray-100/30 w-full h-full absolute top-0 left-0',
    ]) }}>
</div>
