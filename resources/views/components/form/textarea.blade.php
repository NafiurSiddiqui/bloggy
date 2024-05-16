@props(['name' => ''])

<x-form.field>
    <x-form.label label-for="{{ $name }}" />
    <textarea name="{{ $name }}" rows="5"
        class="w-full p-2 text-xs border border-gray-300 focus:outline-none focus:ring rounded  dark:bg-gray-800 dark:text-gray-200"
        required>

    {{ $slot ?? old($name) }}
    </textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
