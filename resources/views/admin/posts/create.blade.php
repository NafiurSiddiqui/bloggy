<x-dashboard.dashboard-layout>


    <x-slot:heading>Create a Post</x-slot:heading>

    @if (isset($categories_are_empty) && $categories_are_empty)
        <p class="mt-2 text-zinc-600">Whoops! Categories are empty. On the first run of the application this is expected.
            No worries!</p>
        <a href="/admin/categories" class="underline hover:text-blue-500 my-4 block">Let's quickly create a category and
            subcategory first</a>
        <x-panel>
            This is to ensure data integrity of the posts and their relationships.
        </x-panel>
    @else
        <div class="flex flex-col justify-between w-full">
            <div
                class="text-lightText-600 dark:text-lightText-400  my-4 text-sm sm:w-[25rem] border dark:border-zinc-700 p-2">
                Convert images here to smaller sizes: <x-text-link class="font-semibold" href="https://tinypng.com/"
                    target="_blank">TinyPNG</x-text-link>

                <x-toast.info>
                    <p><span class="text-lightText-500 dark:text-lightText-400 font-semibold">Thumbnail image:</span> max
                        size 512kb</p>
                    <p><span class="text-lightText-500 dark:text-lightText-400 font-semibold">Og (open graph)
                            image:</span> max size 100kb</p>
                </x-toast.info>
            </div>
            <form action="/admin/post/store" method="post" enctype="multipart/form-data"
                class="w-full lg:w-[80%] px-4">
                @csrf
                @if ($errors->any())
                    <x-toast.error lists :errorBag="$errors" />
                @endif
                <x-form.input name="title" required />
                <x-form.input name="slug" placeholder="slug auto generates when submitted" />
                <x-form.textarea name="description" required />
                <div class="mt-8">
                    <x-form.label label-for="editor" />
                    <x-editor.ck-editor />
                    @error('body')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <x-panel class="px-2 py-3 my-8 ">
                    <h2 class="mb-3 dark:border-zinc-700 font-semibold text-zinc-400 border-b border-zinc-200">Select
                        Thumbnail</h2>

                    <x-form.input name="thumbnail" type="file" required value="{{ old('thumbnail') }}" />
                    <x-form.input name="thumbnail_alt_txt" label="Alt Txt" required />
                </x-panel>

                <x-panel class="px-2 py-3 my-8">
                    <h2 class="mb-3 dark:border-zinc-700 font-semibold text-zinc-400 border-b border-zinc-200">Select
                        Categories</h2>

                    <div class="flex justify-start space-x-4">
                        <x-dashboard.category-dropdown />
                        <x-dashboard.subcategory-dropdown />
                    </div>
                </x-panel>


                <x-panel class="px-2 py-3 my-8 ">
                    <h2 class="mb-3 dark:border-zinc-700 font-semibold text-zinc-400 border-b border-zinc-200">Post Type
                    </h2>
                    <div class="flex space-x-4">
                        <x-form.checkbox input-name="is_featured" id="is_featured" label="Featured" />
                        <x-form.checkbox input-name="is_hot" id="is_hot" label="Hot" />
                    </div>
                </x-panel>
                {{-- SEO --}}
                <x-panel class="px-2 py-3 my-8 ">
                    <h2 class="mb-3 dark:border-zinc-700 font-semibold text-zinc-400 border-b border-zinc-200">SEO
                        fields</h2>
                    <x-form.input name="meta_title" required />
                    <x-form.input name="meta_description" required />
                    <x-form.input name="og_thumbnail" type="file" value="{{ old('og_thumbnail') }}" />
                    <x-form.input name="og_title" />
                </x-panel>

                <x-dashboard.action-panel screenSm>
                    <div class="flex justify-between items-center">
                        <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                            Draft</x-secondary-button>
                        <x-form.button name="is_published" value="1" class="!mt-0">
                            Publish
                        </x-form.button>

                    </div>

                </x-dashboard.action-panel>

                <x-dashboard.action-panel>
                    <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                        Draft</x-secondary-button>
                    <x-form.button name="is_published" value="1">
                        Publish
                    </x-form.button>

                </x-dashboard.action-panel>
            </form>

        </div>
    @endif
</x-dashboard.dashboard-layout>
