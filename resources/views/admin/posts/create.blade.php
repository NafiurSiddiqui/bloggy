<x-dashboard.dashboard-layout>

    <x-slot:heading>Create a Post</x-slot:heading>

    @if (isset($categories_are_empty) && $categories_are_empty)
        <p class="mt-2 text-gray-600">Whoops! Categories are empty. On the first run of the application this is expected.
            No worries!</p>
        <a href="/admin/categories" class="underline hover:text-blue-500 my-4 block">Let's quickly create a category and
            subcategory first</a>
        <x-panel>
            This is to ensure data integrity of the posts and their relationships.
        </x-panel>
    @else
        <div class="flex justify-between w-full">
            <form action="/admin/post/store" method="post" enctype="multipart/form-data" class="w-full lg:w-[80%] px-4">
                @csrf

                <x-form.input name="title" required />
                <x-form.input name="slug" placeholder="slug auto generates when submitted" />
                <x-form.textarea name="description" required />
                <x-editor.ck-editor />
                @error('body')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
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

                <div x-data={open:false}>
                    <x-panel class="lg:hidden px-2 py-3 fixed bottom-0 w-full left-0 bg-slate-200 z-[10000]">
                        <h2 class="mb-3 font-semibold text-gray-500 border-b border-gray-300 ">Actions</h2>
                        <div :class="{ 'block': open, 'hidden': !open, 'flex': open }"
                            class="hidden flex-col border-2 rounded p-4 bg-slate-300">

                            <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                                Draft</x-secondary-button>
                            <x-form.button name="is_published" value="1">
                                Publish
                            </x-form.button>

                        </div>

                        <div class="flex justify-between items-center">
                            <x-secondary-button class="mt-4" link href="/admin/posts">
                                Cancel
                            </x-secondary-button>
                            <x-icons.hamburger />


                        </div>
                    </x-panel>
                </div>
                <aside class="fixed right-0 top-[25%] hidden lg:block ">
                    <x-panel class="px-2 py-3  bg-slate-200 z-[10000] min-h-[20rem]">
                        <h2 class="mb-3 font-semibold text-gray-500 border-b border-gray-300 ">Actions</h2>
                        <div class="flex flex-col border-2 rounded p-4 bg-slate-300">
                            <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                                Draft</x-secondary-button>
                            <x-form.button name="is_published" value="1">
                                Publish
                            </x-form.button>
                        </div>

                        <div class="flex justify-between items-center mt-8">
                            <x-secondary-button class="mt-4 w-full" link href="/admin/posts">
                                Cancel
                            </x-secondary-button>
                        </div>
                    </x-panel>
                </aside>
            </form>

        </div>
    @endif
</x-dashboard.dashboard-layout>
