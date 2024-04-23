@props(['name','label'])

<label for="{{ $name }}" {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-600']) }}  >{{ucwords($label ?? $name) }}</label>
