@props(['name', 'label', 'required', 'srOnly' => false])



<x-form.field>
    <div class="flex">

        <x-form.label label-for="{{ $label ?? $name }}" class="{{ $srOnly ? 'sr-only' : '' }}" />
        @if (isset($required))
            <span class="ml-1 text-red-500">*</span>
        @endif
    </div>
    <input name="{{ $name }}" id="{{ $name }}"
        class="block w-full  border-zinc-300 dark:bg-zinc-800 dark:text-zinc-200 dark:border-zinc-700 focus:border-emerald-500 dark:focus:border-emerald-500 focus:ring-emerald-300 dark:focus:ring-emerald-500 shadow-sm dark:caret-zinc-300"
        {{ $attributes(['value' => old($name)]) }}>
    <x-form.error name="{{ $name }}" />

</x-form.field>
