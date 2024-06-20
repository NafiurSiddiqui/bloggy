@props(['label-for', 'label', 'sr-only'])


@if (isset($srOnly))
    <label for="{{ $labelFor }}" class="sr-only">{{ $labelFor }}</label>
@else
    <label for="{{ $labelFor }}"
        {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-600  dark:text-gray-400']) }}>{{ ucwords($label ?? $labelFor) }}</label>
@endif
