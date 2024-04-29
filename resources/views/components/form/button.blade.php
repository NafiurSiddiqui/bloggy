@props(['link' => false, 'href'=>''])

@if($link)
    <a href="{{$href}}"  class="bg-blue-500 block px-10 py-2 font-semibold rounded text-white mt-4 uppercase hover:bg-blue-600 text-xs" {{$attributes}}>
        {{$slot}}
    </a>
@else

<button type="submit"
        class="bg-blue-500 px-10 py-2 font-semibold rounded text-white mt-4 uppercase hover:bg-blue-600 text-xs" {{$attributes}}>
    {{ $slot }}
</button>
@endif
