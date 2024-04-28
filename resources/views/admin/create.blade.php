<x-dashboard.dashboard-layout>

        <x-slot:heading>Create a Post</x-slot:heading>

        @if(isset($category_is_empty) && $category_is_empty)
            <p>Category is empty dude</p>
            <a href="/admin/categories" class="underline hover:text-blue-500 my-4 block">Let's quickly create a category and subcategory first</a>
            <x-panel>
                This is to ensure data integrity of the posts and their relationships.
            </x-panel>
        @else
        <form action="/admin/post/store" method="post" enctype="multipart/form-data" class="max-w-xl" >
            @csrf
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
            {{-- SEO --}}
            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">SEO fields</h2>
                <x-form.input name="meta_title"  required/>
                <x-form.input name="meta_description"  required/>
                <x-form.input name="og_thumbnail" type="file"  />
                <x-form.input name="og_title"  />
            </x-panel>


            <x-panel class="px-2 py-3 my-8">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Actions</h2>
                <div>
                    <x-form.button >
                        Publish
                    </x-form.button>

{{--                    <x-primary-button>Publish</x-primary-button>--}}


                    <x-secondary-button>Save as Draft</x-secondary-button>
                </div>
            </x-panel>

            @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </form >
       @endif
</x-dashboard.dashboard-layout>
