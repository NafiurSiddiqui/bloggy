<x-dashboard.dashboard-layout>

    <x-slot:heading>Create a Post</x-slot:heading>
    <x-secondary-button class="mt-4" link href="/admin/posts">
        Cancel
    </x-secondary-button>
    @if (isset($categories_are_empty) && $categories_are_empty)
        <p class="mt-2 text-gray-600">Whoops! Categories are empty. On the first run of the application this is expected.
            No worries!</p>
        <a href="/admin/categories" class="underline hover:text-blue-500 my-4 block">Let's quickly create a category and
            subcategory first</a>
        <x-panel>
            This is to ensure data integrity of the posts and their relationships.
        </x-panel>
    @else
        <form action="/admin/post/store" method="post" enctype="multipart/form-data" class="max-w-xl">
            @csrf
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
            <x-form.input name="title" required />
            <x-form.input name="slug" placeholder="slug auto generates when submitted" />
            <x-form.textarea name="description" required />
            <x-editor.ck-editor />

            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Thumbnail</h2>
                <x-form.input name="thumbnail" type="file" required />
                <x-form.input name="thumbnail_alt_txt" label="Alt Txt" required />
            </x-panel>

            <x-panel class="px-2 py-3 my-8">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Categories</h2>

                <div class="flex justify-start space-x-4">
                    <x-dashboard.category-dropdown />
                    <x-dashboard.subcategory-dropdown />
                </div>
            </x-panel>


            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Post Type</h2>
                <div class="flex space-x-4">
                    <x-form.checkbox input-name="is_featured" id="is_featured" label="Featured" />
                    <x-form.checkbox input-name="is_hot" id="is_hot" label="Hot" />
                </div>
            </x-panel>
            {{-- SEO --}}
            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">SEO fields</h2>
                <x-form.input name="meta_title" required />
                <x-form.input name="meta_description" required />
                <x-form.input name="og_thumbnail" type="file" />
                <x-form.input name="og_title" />
            </x-panel>


            <x-panel class="px-2 py-3 my-8">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Actions</h2>
                <div>
                    <x-secondary-button type="submit" name='is_draft' value='1'>Save as Draft</x-secondary-button>
                    <x-form.button name="is_published" value="1">
                        Publish
                    </x-form.button>

                </div>
            </x-panel>

        </form>
        @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    @endif
</x-dashboard.dashboard-layout>
