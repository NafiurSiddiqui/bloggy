@props(['name' => '', 'required' => false, 'sr-only' => ''])


@php
    $requiredClasses = 'block mb-2 text-sm font-medium text-gray-600  dark:text-gray-400';
    if ($required) {
        $requiredClasses =
            'block mb-2 text-sm font-medium text-gray-600  dark:text-gray-400 after:content-[\'*\'] after:text-red-500';
    }

    if (isset($srOnly) || ($required && isset($srOnly))) {
        $requiredClasses = 'sr-only';
    }

    if (!isset($srOnly) && !$required) {
        $requiredClasses = 'block mb-2 text-sm font-medium text-gray-600  dark:text-gray-400';
    }

    // dd($requiredClasses);

@endphp

<x-form.field>
    <x-form.label label-for="{{ $name }}" class="{{ $requiredClasses }}" sr-only="{{ isset($srOnly) }}" />
    <textarea name="{{ $name }}" rows="5"
        class="w-full border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300 rounded p-2 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700"
        {{ $attributes }} {{ $required ? 'required' : '' }}>

    {{ $slot ?? old($name) }}
    </textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
