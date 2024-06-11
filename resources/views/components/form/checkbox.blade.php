@props(['input-name', 'label', 'post', 'checkbox-only', 'id'])

{{-- $post->$name = $post . $inputName (e.g - $post->is_featured) this is to dynamically get the post type --}}

@if (isset($checkboxOnly))
    <div class="flex items-center">
        <input type="checkbox" id="{{ $id }}" name={{ $inputName }}
            {{ $attributes->merge(['class' => 'w-5 h-5 text-blue-600 bg-gray-50 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600 cursor-pointer']) }}
            @checked(old($inputName))>
        <x-form.label label-for="{{ $inputName }}" sr-only />
        <x-form.error name="{{ $inputName }}" class="block mt-1" />
    </div>
@else
    <div class="">
        <input type="checkbox" id="{{ $id }}" name={{ $inputName }}
            {{ $attributes->merge(['class' => 'w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600']) }}
            @checked(isset($post) && $post->$inputName == 'on' ? old($inputName, $post->$inputName) : old($inputName))>
        <x-form.label label-for="{{ $inputName }}" label="{{ isset($label) ? $label : '' }}" class="inline ml-1" />
        <x-form.error name="{{ $inputName }}" class="block mt-1" />
    </div>
@endif
