@props(['items','type'])

@if($items->isEmpty())

   <div>
       <p>No item yet!</p>
       <x-secondary-button>Create a {{ucfirst($type)}}</x-secondary-button>
   </div>
@else
<div>
    <x-form.label name="{{$type}}" />
    <select name="{{$type}}_id" id="{{$type}}_id" class="rounded-md w-32" title="Select a {{$type}} for the post">
        <option value="not selected" >---</option>
        @foreach($items as $item)
            <option value="{{$item->id}}" {{ old(("$type"."_id")) == $item->id ? 'selected':'' }}>{{ucwords($item->name)}}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $type }}_id" />

</div>
@endif
