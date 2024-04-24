<x-dashboard.dashboard-layout>

        <h1 class="font-semibold text-xl text-gray-500">Create A Post</h1>

        <form action="/admin/post/store" method="post" enctype="multipart/form-data" class="max-w-xl">
            @csrf
            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.textarea name="description" required />
            <x-form.textarea name="body" required />

            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Thumbnail</h2>
                <x-form.input name="thumbnail" type="file" required />
                <x-form.input name="thumbnail_alt_txt" label="Alt Txt" requried />
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
                   <x-form.checkbox name="is_featured" label="Featured"  />
                   <x-form.checkbox name="is_hot" label="Hot"/>
               </div>
            </x-panel>

            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">SEO fields</h2>
                <x-form.input name="meta_title"  required/>
                <x-form.input name="meta_description"  required/>
                <x-form.input name="og_thumbnail" type="file"  required/>
                <x-form.input name="og_title"  required/>
            </x-panel>

{{--            Need category and subcategory dropdown. This is where you may need to create the blade class component --}}
            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Actions</h2>
                <div>
                    <x-form.button>
                        Publish
                    </x-form.button>

{{--                    <x-primary-button>Publish</x-primary-button>--}}


                    <x-secondary-button>Save as Draft</x-secondary-button>
                </div>
            </x-panel>

            @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </form>

</x-dashboard.dashboard-layout>
