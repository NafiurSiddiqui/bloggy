@props(['post', 'subcategory'])
{{-- 
    ------ TO show old value --------
    
    - post ? then matches the category_id with the post category_id 
    - subcategory ? then matches the category_id with the subcategory category_id 
    - else ? then matches the category_id with the old category_id
    - This is for the reusability of this component
    --}}

@if ($categories->isEmpty())
    <div>
        <p class="mt-4 mb-2 text-sm font-semibold text-gray-400">No Categories yet</p>
        <x-secondary-button link href="/admin/categories/create">Create a Category</x-secondary-button>
    </div>
@else
    <div class="my-4">
        <x-form.label label-for="category" />
        <select name="category_id" id="category_id" class="rounded-md w-32" title="Select a category for the post">

            <option value="---">---</option>
            @foreach ($categories as $category)
                @if (isset($post))
                    <option value="{{ $category ?? $category->id }}"
                        {{ $post->category?->id == $category->id ? 'selected' : '' }}>
                        {{ ucwords($category->title) }}</option>
                @elseif (isset($subcategory))
                    <option value="{{ $category->id }}"
                        @if ($subcategory->category != null) {{ $subcategory->category->id == $category->id ? 'selected' : '' }} @endif>
                        {{ ucwords($category->title) }}</option>
                @else
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ ucwords($category->title) }}</option>
                @endif
            @endforeach
        </select>

        <x-form.error name="category_id" />
    </div>
@endif
