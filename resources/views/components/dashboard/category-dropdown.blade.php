@props(['post', 'subcategory'])


@if ($categories->isEmpty())
    <div>
        <p>No item yet!</p>
        <x-secondary-button>Create a {{ ucfirst($type) }}</x-secondary-button>
    </div>
@else
    <div class="my-4">
        <x-form.label name="category" />
        <select name="category_id" id="category_id" class="rounded-md w-32" title="Select a category for the post">

            <option value="---">---</option>
            @foreach ($categories as $category)
                @if (isset($post) || isset($subcategory))
                    <option value="{{ $category->id }}"
                        {{ $post->category->id ?? $subcategory->category->id == $category->id ? 'selected' : '' }}>
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
