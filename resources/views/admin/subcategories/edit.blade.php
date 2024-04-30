<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Edit Subcategory: {{$subcategory->name}}
    </x-slot:heading>

    <x-panel>
        <form  class="subcategory-form" action="/admin/subcategories/{{$subcategory->id}}" method="post" >
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $subcategory->name)" />
            <x-form.input name="slug" :value="old('slug', $subcategory->slug)"/>

            @php
                $categories = \App\Models\Category::all();
             @endphp
            <div class="my-4">
                <x-form.label name="category" />
                <select name="category_id" id="category_id" class="rounded-md w-32" title="Select a Category for the post">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ $subcategory->category_id == $category->id ? 'selected':'' }}>{{ucwords($category->name)}}</option>
                    @endforeach
                </select>

                <x-form.error name="category_id" />

            </div>
           <x-form.action-buttons edit cancel-href="/admin/subcategories" submit-label="Update" />
        </form>

        <form action="/admin/subcategories/{{$subcategory->id}}" method="POST" id="form-delete" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
