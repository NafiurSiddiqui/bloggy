@props(['name', 'label', 'required' => false])

<x-form.field>
    <x-form.label label-for="{{ $label ?? $name }}"
        class="{{ $required ? 'after:content-[\'*\'] after:text-red-500' : '' }}" />
    <input name="{{ $name }}" id="{{ $name }}"
        class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 placeholder:text-gray-300"
        {{ $attributes(['value' => old($name)]) }}>
    <x-form.error name="{{ $name }}" />
</x-form.field>
