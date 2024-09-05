@props([
    'submit',
    'label',
    'button-only' => false,
    'form-id' => 'form-delete',
    'formButton' => false,
    'sm' => false,
    'noFormId' => false,
])

@php

    $modalButtonClass = $formButton
        ? 'font-medium  text-rose-400 dark:text-rose-500 hover:bg-rose-200 hover:text-rose-600 cursor-pointer border border-rose-300 bg-rose-100 rounded-sm text-center p-4'
        : 'font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600 cursor-pointer ';

    $btnClass = $sm
        ? 'border border-rose-200 dark:text-rose-400 text-sm hover:text-rose-600  dark:hover:border-rose-400 ms-3 py-1 px-4  text-rose-400 dark:border-rose-300  rounded-sm text-center dark:hover:bg-rose-600 dark:hover:text-white dark:focus:bg-rose-700 focus:ring-2 dark:focus:ring-rose-400'
        : 'border border-rose-200 dark:text-rose-400 hover:text-rose-600  dark:hover:border-rose-400 ms-3 py-2 px-4  text-rose-400 border dark:border-rose-300  rounded-sm text-center dark:hover:bg-rose-600 dark:hover:text-white';
@endphp



@if (isset($submit) || isset($buttonOnly))
    <button type="{{ isset($submit) ? 'submit' : 'button' }}"
        @if (!$noFormId) form="{{ $formId ?? 'form-delete' }}" @endif
        {{ $attributes->merge(['class' => $btnClass]) }}>{{ $label ?? 'Delete' }}</button>
@else
    <span {{ $attributes->merge(['class' => $modalButtonClass]) }} x-data=""
        x-on:click="$dispatch('open-modal','confirm-delete')">{{ $label ?? 'Delete' }}</span>
@endif
