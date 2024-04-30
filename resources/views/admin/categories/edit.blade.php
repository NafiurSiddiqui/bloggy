<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Edit Category: {{$category->title}}
    </x-slot:heading>

    <x-panel>
        <form action="/admin/categories/{{$category->id}}" method="post">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name',$category->name)"/>
            <x-form.input name="slug" :value="old('slug',$category->slug)"/>
            <x-form.action-buttons
                edit
                cancel-href="/admin/categories"    submit-label="Update"
                class="justify-between"
            />
        </form>

        <form action="/admin/categories/{{$category->id}}" method="POST" id="form-delete" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
