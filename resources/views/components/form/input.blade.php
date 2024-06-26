@props(['name', 'label', 'required'])



<x-form.field>
    <div class="flex">
        <x-form.label label-for="{{ $label ?? $name }}" />
        @if (isset($required))
            <span class="ml-1 text-red-500">*</span>
        @endif
    </div>
    <input name="{{ $name }}" id="{{ $name }}"
        class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 placeholder:text-gray-300"
        {{ $attributes(['value' => old($name)]) }}>
    <x-form.error name="{{ $name }}" />
</x-form.field>
