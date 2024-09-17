<x-dashboard.dashboard-layout>

    <x-slot:heading>Edit Post: {{ $post->title }}</x-slot:heading>
    <div class="flex flex-col  justify-between w-full">
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
        <form action="/admin/post/{{ $post->slug }}" method="post" enctype="multipart/form-data" class="max-w-xl">
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <x-toast.error lists :errorBag="$errors" />
            @endif
            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('slug', $post->slug)" />
            <x-form.textarea name="description">
                {{ old('description', $post->description) }}
            </x-form.textarea>

            <div class="my-4">
                <x-editor.ck-editor :post="$post" />
            </div>


            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Thumbnail</h2>
                <div class="w-52">
                    {{ $post->getFirstMedia('thumbnails') }}
                </div>
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
                        alt="{{ $post->thumbnail_alt_txt ?? 'thumbnail' }}"
                        class="my-8 w-[200px] h-[200px] object-contain border dark:border-zinc-700">
                @endif
                <x-form.input name="og_thumbnail" type="file"
                    value="{{ old('og_thumbnail', $post->og_thumbnail) }}" />
                <x-form.input name="og_title" :value="old('og_title', $post->og_title)" />
            </x-panel>

            <x-dashboard.action-panel>
                <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                    Draft</x-secondary-button>
                <x-secondary-button type="submit" name='is_unpublished' value='1'
                    class="mt-4">Unpublish</x-secondary-button>
                <x-form.button name="is_published" value="1">
                    Update
                </x-form.button>
                <x-danger-button formButton x-data=""
                    x-on:click="$dispatch('open-modal','confirm-delete')" class="mt-12 mb-4">Delete</x-danger-button>
            </x-dashboard.action-panel>

            <x-dashboard.action-panel screenSm>
                <x-secondary-button type="submit" name='is_draft' value='1'>Save as
                    Draft</x-secondary-button>
                <x-secondary-button type="submit" name='is_unpublished' value='1'
                    class="mt-4">Unpublish</x-secondary-button>
                <x-form.button name="is_published" value="1">
                    Update
                </x-form.button>
                <x-danger-button formButton x-data=""
                    x-on:click="$dispatch('open-modal','confirm-delete')" class="mt-12 mb-4">Delete</x-danger-button>
            </x-dashboard.action-panel>
            {{-- @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror --}}
        </form>


        <form @submit.prevent="console.log('prevented')" id="form-delete" class="hidden"
            action="/admin/post/{{ $post->slug }}" method="post">
            @csrf
            @method('Delete')
        </form>
        <x-modal-delete type="post" />

    </div>
</x-dashboard.dashboard-layout>
