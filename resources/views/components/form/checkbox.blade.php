@props(['input-name', 'label', 'post', 'checkbox-only', 'id'])

{{-- $post->$name = $post . $inputName (e.g - $post->is_featured) this is to dynamically get the post type --}}

@if (isset($checkboxOnly))
    <div class="flex items-center">
        <input type="checkbox" id="{{ $id }}" name={{ $inputName }}
            {{ $attributes->merge(['class' => 'w-5 h-5 text-emerald-600 bg-zinc-50 border-zinc-300 rounded-sm focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:ring-offset-zinc-800 dark:focus:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-800 dark:border-zinc-700 dark:hover:bg-zinc-600 cursor-pointer']) }}
            @checked(old($inputName))>
        <x-form.label label-for="{{ $inputName }}" sr-only />
        <x-form.error name="{{ $inputName }}" class="block mt-1" />
    </div>
@else
    <div class="">
        <input type="checkbox" id="{{ $id }}" name={{ $inputName }}
            {{ $attributes->merge(['class' => 'w-5 h-5 text-emerald-600 bg-zinc-100 border-zinc-300 rounded-sm focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:ring-offset-zinc-800 dark:focus:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-800 dark:border-zinc-700 cursor-pointer']) }}
            @checked(isset($post) && $post->$inputName == 'on' ? old($inputName, $post->$inputName) : old($inputName))>
        <x-form.label label-for="{{ $inputName }}" label="{{ isset($label) ? $label : '' }}" class="inline ml-1" />
        <x-form.error name="{{ $inputName }}" class="block mt-1" />
    </div>
@endif
