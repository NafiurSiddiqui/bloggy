@props(['input-name', 'label', 'id'])

<div>
    <input type="radio" id="{{ $id }}" name={{ $inputName }}
        class="dark:bg-darkNavFooter border-zinc-300 dark:border-zinc-700 text-emerald-600 shadow-sm focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:focus:ring-offset-zinc-800 cursor-pointer">
    <x-form.label label-for="{{ $inputName }}" label="{{ isset($label) ? $label : '' }}" class="inline ml-1" />
    <x-form.error name="{{ $inputName }}" class="block mt-1" />
</div>
