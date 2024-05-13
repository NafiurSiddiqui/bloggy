<x-dashboard.dashboard-layout>

    <x-slot:heading>Edit Post: {{ $post->title }}</x-slot:heading>
    <x-secondary-button class="mt-4" link href="/admin/posts">
        Cancel
    </x-secondary-button>
    <form action="/admin/post/{{ $post->slug }}" method="post" enctype="multipart/form-data" class="max-w-xl">
        @csrf
        @method('PATCH')
        {{-- TODO: Remove the test errors below --}}
        @if ($errors->any())
            <div class="bg-rose-400 ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <x-form.input name="title" :value="old('title', $post->title)" />
        <x-form.input name="slug" :value="old('slug', $post->slug)" />
        <x-form.textarea name="description">
            {{ old('description', $post->description) }}
        </x-form.textarea>
        <x-form.textarea name="body">
            {{ old('body', $post->body) }}
        </x-form.textarea>

        <x-panel class="px-2 py-3 my-8 ">
            <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Thumbnail</h2>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->thumbnail_alt_txt ?? 'Thumbnail' }}">
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
            <x-form.input name="thumbnail_alt_txt" label="Alt Txt" requried :value="old('thumbnail_alt_txt', $post->thumbnail_alt_txt)" />
        </x-panel>

        <x-panel class="px-2 py-3 my-8">
            <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Categories</h2>

            <div class="flex justify-start space-x-4">
                <x-dashboard.category-dropdown :post="$post" />
                <x-dashboard.subcategory-dropdown :post="$post" subacategory />
            </div>
        </x-panel>

        <x-panel class="px-2 py-3 my-8 ">
            <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Post Type</h2>
            <div class="flex space-x-4">

                <x-form.checkbox input-name="is_featured" id="is_featured" label="Featured" :post="$post" />
                <x-form.checkbox input-name="is_hot" id="is_hot" label="Hot" :post="$post" />
            </div>
        </x-panel>

        {{-- SEO --}}
        <x-panel class="px-2 py-3 my-8 ">
            <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">SEO fields</h2>
            <x-form.input name="meta_title" :value="old('meta_title', $post->meta_title)" />
            <x-form.input name="meta_description" :value="old('meta_title', $post->meta_description)" />
            {{-- @dd($post->og_thumbnail) --}}
            @if ($post->og_thumbnail)
                <img src="{{ asset('storage/' . $post->og_thumbnail) }}"
                    alt="{{ $post->thumbnail_alt_txt ?? 'thumbnail' }}" class="my-8">
            @endif
            <x-form.input name="og_thumbnail" type="file" />
            <x-form.input name="og_title" :value="old('og_title', $post->og_title)" />
        </x-panel>


        <x-panel class="px-2 py-3 my-8">
            <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Actions</h2>

            <x-form.action-buttons edit secondary-btn-href="#" submit-label="Update" secondary-btn-label='Save as Draft'
                type="post" />
        </x-panel>

        @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </form>


    <form @submit.prevent="console.log('prevented')" id="form-delete" class="hidden"
        action="/admin/post/{{ $post->slug }}" method="post">
        @csrf
        @method('Delete')
    </form>

</x-dashboard.dashboard-layout>
