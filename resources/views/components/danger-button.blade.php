@props(['submit', 'label', 'button-only' => false, 'form-id' => 'form-delete', 'formButton' => false])


@php

    $modalButtonClass = $formButton
        ? 'mt-4 font-medium  text-rose-400 dark:text-rose-500 hover:bg-rose-200 hover:text-rose-600 cursor-pointer border border-rose-300 bg-rose-100 rounded-md text-center p-4'
        : 'mt-4 font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600 cursor-pointer';
@endphp



@if (isset($submit) || isset($buttonOnly))
    <button type="{{ isset($submit) ? 'submit' : 'button' }}" form="{{ $formId ?? 'form-delete' }}"
        {{ $attributes->merge(['class' => 'border border-rose-200 dark:text-rose-500 font-medium hover:text-rose-600  ms-3 py-4 px-4 rounded text-rose-400 border border-rose-300 bg-rose-100 rounded-md text-center ']) }}>{{ $label ?? 'Delete' }}</button>
@else
    <span {{ $attributes->merge(['class' => $modalButtonClass]) }} x-data=""
        x-on:click="$dispatch('open-modal','confirm-delete')">{{ $label ?? 'Delete' }}</span>
@endif
