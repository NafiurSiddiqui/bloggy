@props(['items','type'])

@if(empty($items))
    <p>No item yet!</p>
    <button type="button">Create a {{ucfirst($type)}}</button>
@else
<div>
    <x-form.label name="{{$type}}" />
    <select name="{{$type}}_id" id="{{$type}}_id" class="rounded-md w-32" title="Select a {{$type}} for the post">
        <option value="default">All</option>
        @foreach($items as $item)
            <option value="{{$item->id}}" {{ old(("$type"."_id")) == $item->id ? 'selected':'' }}>{{ucwords($item->name)}}</option>
        @endforeach
    </select>
</div>
@endif
