@props(['name'=>''])

@error($name)
<p class="text-red-500 mt-2 text-xs">{{ $name == 'category_id'? 'Please select a category': $message }}</p>
@enderror
