<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Edit Subcategory: {{$subcategory->title}}
    </x-slot:heading>

    <x-panel>
        <form  class="subcategory-form" action="/admin/subcategories/{{$subcategory->id}}" method="post" >
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('name', $subcategory->title)" />
            <x-form.input name="slug" :value="old('slug', $subcategory->slug)"/>
            <x-dashboard.category-dropdown :subcategory="$subcategory"/>
           <x-form.action-buttons edit cancel-href="/admin/subcategories" submit-label="Update" />
        </form>

        <form action="/admin/subcategories/{{$subcategory->id}}" method="POST" id="form-delete" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
