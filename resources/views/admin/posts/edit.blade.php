<x-dashboard.dashboard-layout>

    <x-slot:heading>Edit Post: {{ $post->title }}</x-slot:heading>
    <div class="flex justify-between w-full">
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

            <x-editor.ck-editor :post="$post" />


            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Thumbnail</h2>
                <img src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="{{ $post->thumbnail_alt_txt ?? 'Thumbnail' }}">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                <x-form.input name="thumbnail_alt_txt" label="Alt Txt" requried :value="old('thumbnail_alt_txt', $post->thumbnail_alt_txt)" />
            </x-panel>

            <x-panel class="px-2 py-3 my-8">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Categories</h2>

                <div class="flex justify-start space-x-4">
                    <x-dashboard.category-dropdown :post="$post" />
                    <x-dashboard.subcategory-dropdown :post="$post" />
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


            {{-- <x-panel class="px-2 py-3 my-8">
            <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Actions</h2>

            <x-form.action-buttons edit secondary-btn-href="#" submit-label="Update" secondary-btn-label='Save as Draft'
                type="post" />
        </x-panel> --}}

            <div x-data={open:false}>
                <x-panel class="lg:hidden px-2 py-3 fixed bottom-0 w-full left-0 bg-slate-200 z-[10000]">
                    <h2 class="mb-3 font-semibold text-gray-500 border-b border-gray-300 ">Actions</h2>
                    <div :class="{ 'block': open, 'hidden': !open, 'flex': open }"
                        class="hidden flex-col border-2 rounded p-4 bg-slate-300">

                        <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                            Draft</x-secondary-button>
                        <x-secondary-button type="submit" name='is_unpublished' value='1'
                            class="mt-4">Unpublish</x-secondary-button>
                        <x-form.button name="is_published" value="1">
                            Update
                        </x-form.button>
                        <x-danger-button formButton x-data=""
                            x-on:click="$dispatch('open-modal','confirm-delete')"
                            class="mt-12 mb-4">Delete</x-danger-button>

                    </div>

                    <div class="flex justify-between items-center">
                        <x-secondary-button class="mt-4" link href="/admin/posts">
                            Cancel
                        </x-secondary-button>
                        <x-icons.hamburger />


                    </div>
                    <x-modal-delete type="post" />
                </x-panel>
            </div>
            <aside class="fixed right-0 top-[25%] hidden lg:block ">
                <x-panel class="px-2 py-3  bg-slate-200 z-[10000] min-h-[20rem]">
                    <h2 class="mb-3 font-semibold text-gray-500 border-b border-gray-300 ">Actions</h2>
                    <div class="flex flex-col border-2 rounded p-4 bg-slate-300">

                        <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                            Draft</x-secondary-button>
                        <x-secondary-button type="submit" name='is_unpublished' value='1'
                            class="mt-4">Unpublish</x-secondary-button>
                        <x-form.button name="is_published" value="1">
                            Update
                        </x-form.button>
                        <x-danger-button formButton x-data=""
                            x-on:click="$dispatch('open-modal','confirm-delete')"
                            class="mt-12 mb-4">Delete</x-danger-button>


                    </div>

                    <div class="flex justify-between items-center mt-8">
                        <x-secondary-button class="mt-4 w-full" link href="/admin/posts">
                            Cancel
                        </x-secondary-button>

                    </div>
                </x-panel>
            </aside>


            @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </form>


        <form @submit.prevent="console.log('prevented')" id="form-delete" class="hidden"
            action="/admin/post/{{ $post->slug }}" method="post">
            @csrf
            @method('Delete')
        </form>
        <x-modal-delete type="post" />

    </div>
</x-dashboard.dashboard-layout>
