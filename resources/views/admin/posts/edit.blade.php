<x-dashboard.dashboard-layout>

    <x-slot:heading>Edit Post: {{$post->title}}</x-slot:heading>
    <x-secondary-button class="mt-4" link href="/admin/posts">
        Cancel
    </x-secondary-button>
        <form action="/admin/post/{{$post->slug}}" method="post" enctype="multipart/form-data" class="max-w-xl" >
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <div class="bg-rose-400 ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <x-form.input name="title" required :value="old('title',$post->title)" />
            <x-form.input name="slug" required :value="old('slug',$post->slug)"/>
            <x-form.textarea name="description" required >
                {{old('description',$post->description)}}
            </x-form.textarea>
            <x-form.textarea name="body" required>
                {{old('body',$post->body)}}
            </x-form.textarea>

            <x-panel class="px-2 py-3 my-8 ">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Thumbnail</h2>
                <x-form.input name="thumbnail" type="file" required :value="old('thumbnail',$post->thumbnail)" />
                <x-form.input name="thumbnail_alt_txt" label="Alt Txt" requried :value="old('thumbnail_alt_txt',$post->thumbnail_alt_txt)" />
            </x-panel>

            <x-panel class="px-2 py-3 my-8">
                <h2 class="mb-3 font-semibold text-gray-400 border-b border-gray-200">Select Categories</h2>

                <div class="flex justify-start space-x-4">
                    <x-dashboard.category-dropdown :post="$post"/>
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
                    <x-form.button value="publish">
                        Publish
                    </x-form.button>

                    <x-secondary-button>Save as Draft</x-secondary-button>
                </div>
            </x-panel>

            @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </form >

</x-dashboard.dashboard-layout>
