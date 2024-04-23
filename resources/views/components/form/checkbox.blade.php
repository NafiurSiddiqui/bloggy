@props(['name','label'])

<div>
    <input type="checkbox" name="{{$name}}" id="{{$name}}" class="relative bg-transparent  h-6 w-6 rounded-sm border-gray-400 cursor-pointer" @checked(old($name))>
    <x-form.label name="{{$label ?? $name}}" class="inline ml-1"/>

</div>
<x-form.error name="{{ $name }}" />
