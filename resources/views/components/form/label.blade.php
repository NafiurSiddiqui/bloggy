@props(['label-for', 'label', 'sr-only'])

{{-- @dd(isset($srOnly)) --}}
@if (isset($srOnly) && $srOnly)
    <label for="{{ $labelFor }}" class="sr-only">{{ $labelFor }}</label>
@else
    <label for="{{ $labelFor }}"
        {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-zinc-600  dark:text-zinc-400']) }}>{{ ucwords($label ?? $labelFor) }}</label>
@endif
