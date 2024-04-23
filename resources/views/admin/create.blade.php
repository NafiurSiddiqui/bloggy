<x-dashboard.dashboard-layout>

        <h1>Create A Post</h1>

        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" required />
            <x-form.input name="slug" required />
{{--            <x-form.textarea name="excerpt" required />--}}
            <x-form.input name="thumbnail" type="file" required />
{{--            <x-form.textarea name="body" required />--}}
{{--            <x-form.dropdown name="category" />--}}

            <div class="flex justify-end">
                <x-form.button>
                    Publish
                </x-form.button>
            </div>
            @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

        </form>

</x-dashboard.dashboard-layout>
