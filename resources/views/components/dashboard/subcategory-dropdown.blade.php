@props(['post'])


@if ($subcategories->isEmpty())
    <div>
        <p>No item yet!</p>
        <x-secondary-button>Create a Subcategory</x-secondary-button>
    </div>
@else
    <div class="my-4">
        <x-form.label label-for="subcategory" />
        <x-select for-name="subcategory_id" for-id="subcategory_id" for-title="Select a subcategory"
            class="@error('category_id') border border-rose-500 @enderror">

            <option value="---">---</option>
            @foreach ($subcategories as $subcategory)
                @if (isset($post))
                    <option value="{{ $subcategory ? $subcategory->id : null }}"
                        {{ $post->subcategory?->id == $subcategory->id ? 'selected' : '' }}>
                        {{ ucwords($subcategory->title) }}</option>
                @else
                    <option value="{{ $subcategory->id }}"
                        {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                        {{ ucwords($subcategory->title) }}</option>
                @endif
            @endforeach
        </x-select>
        <x-form.error name="subcategory_id" />
    </div>
@endif
