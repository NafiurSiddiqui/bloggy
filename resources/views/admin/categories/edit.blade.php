<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Edit Category: {{ $category->title }}
    </x-slot:heading>

    <x-panel>
        <form action="/admin/categories/{{ $category->id }}" method="post">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('name', $category->title)" />
            <x-form.input name="slug" :value="old('slug', $category->slug)" />
            <x-form.action-buttons edit secondary-btn-href="/admin/categories" submit-label="Update" />
        </form>

        <form action="/admin/categories/{{ $category->id }}" method="POST" id="form-delete" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
