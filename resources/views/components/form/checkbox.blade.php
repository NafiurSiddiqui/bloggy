@props(['name', 'label', 'post'])

{{-- $post->$name = $post . $name (e.g - $post->is_featured) this is to dynamically get the post type --}}


<div class="">
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}"
        class="relative bg-transparent  h-6 w-6 rounded-sm border-gray-400 cursor-pointer" @checked(isset($post) && $post->$name == 'on' ? old($name, $post->$name) : old($name))>

    <x-form.label name="{{ $name }}" label="{{ isset($label) ? $label : '' }}" class="inline ml-1" />
    <x-form.error name="{{ $name }}" class="block mt-1" />
</div>
