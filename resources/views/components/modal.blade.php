@props(['btn-label'])
{{--TODO: delete the test isOpen variable in production--}}
{{--@props(['btn-label', 'isOpen' => false])--}}
{{--<div x-data="{isOpen: {{$isOpen}}}">--}}
<div x-data="{isOpen: false}">
    <section  class="bg-gray-800 text-white flex justify-center items-center absolute w-full h-screen inset-0 bg-opacity-80 backdrop-blur" x-on:click="isOpen = false" x-show="isOpen">
        <div class="bg-gray-200 w-4/5 text-gray-600 px-4 py-8 rounded-md" x-on:click.stop >
           {{$slot}}
        </div>
    </section>
    <x-secondary-button @click="isOpen = true">{{$btnLabel}}</x-secondary-button>
</div>
