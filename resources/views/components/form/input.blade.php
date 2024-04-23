@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input name="{{ $name }}" id="{{ $name }}"
           class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        {{ $attributes(['value' => old($name)]) }}>
    <x-form.error name="{{ $name }}" />
</x-form.field>
