@props(['submit', 'label', 'button-only' => false, 'form-id' => 'form-delete', 'formButton' => false])


@php

    $modalButtonClass = $formButton
        ? 'font-medium  text-rose-400 dark:text-rose-500 hover:bg-rose-200 hover:text-rose-600 cursor-pointer border border-rose-300 bg-rose-100 rounded-sm text-center p-4'
        : 'font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600 cursor-pointer ';
@endphp



@if (isset($submit) || isset($buttonOnly))
    <button type="{{ isset($submit) ? 'submit' : 'button' }}" form="{{ $formId ?? 'form-delete' }}"
        {{ $attributes->merge(['class' => 'border border-rose-200 dark:text-rose-400 hover:text-rose-600 dark:hover:text-rose-500 dark:hover:border-rose-400 ms-3 py-2 px-4  text-rose-400 border border-rose-300  rounded-sm text-center dark:hover:bg-darkNavFooter']) }}>{{ $label ?? 'Delete' }}</button>
@else
    <span {{ $attributes->merge(['class' => $modalButtonClass]) }} x-data=""
        x-on:click="$dispatch('open-modal','confirm-delete')">{{ $label ?? 'Delete' }}</span>
@endif
