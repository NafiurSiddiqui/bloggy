@props(['input-name', 'label', 'id'])

<div>
    <input type="radio" id="{{ $id }}" name={{ $inputName }}>
    <x-form.label label-for="{{ $inputName }}" label="{{ isset($label) ? $label : '' }}" class="inline ml-1" />
    <x-form.error name="{{ $inputName }}" class="block mt-1" />
</div>
