@props(['submit', 'label', 'button-only' => false, 'form-id' => 'form-delete'])

@if (isset($submit) || isset($buttonOnly))
    <button type="{{ isset($submit) ? 'submit' : 'button' }}" form="{{ $formId ?? 'form-delete' }}"
        {{ $attributes->merge(['class' => 'border border-rose-200 dark:text-rose-500 font-medium hover:text-rose-600  ms-3 py-2 px-4 rounded text-rose-400']) }}>{{ $label ?? 'Delete' }}</button>
@else
    <span
        {{ $attributes->merge(['class' => 'mt-4 font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600 cursor-pointer']) }}
        x-data="" x-on:click="$dispatch('open-modal','confirm-delete')">{{ $label ?? 'Delete' }}</span>
@endif
