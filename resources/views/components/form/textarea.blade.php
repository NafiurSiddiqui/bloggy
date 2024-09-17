@props(['name' => '', 'required' => false, 'sr-only' => ''])


@php
    $requiredClasses = 'block mb-2 text-sm font-medium text-lightText-600  dark:text-zinc-400';
    if ($required) {
        $requiredClasses =
            'block mb-2 text-sm font-medium text-lightText-600  dark:text-zinc-400 after:content-[\'*\'] after:text-red-500';
    }

    if (isset($srOnly) || ($required && isset($srOnly))) {
        $requiredClasses = 'sr-only';
    }

    if (!isset($srOnly) && !$required) {
        $requiredClasses = 'block mb-2 text-sm font-medium text-lightText-600  dark:text-zinc-400';
    }

@endphp

<x-form.field>
    <x-form.label label-for="{{ $name }}" class="{{ $requiredClasses }}" sr-only="{{ isset($srOnly) }}" />
    <textarea name="{{ $name }}" rows="5"
        class="w-full p-2 border border-zinc-300 text-lightText-500 focus:outline-none focus:ring focus:ring-emerald-300 dark:focus:ring-emerald-500  dark:bg-zinc-800 dark:text-zinc-200 dark:border-zinc-700 dark:focus:border-none @error($name) border-rose-500 @enderror"
        {{ $attributes }} {{ $required ? 'required' : '' }}>

    {{ $slot ?? old($name) }}
    </textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
