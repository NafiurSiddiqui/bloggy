<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Create a Sub-category
    </x-slot:heading>

    <x-panel>
        <form  class="subcategory-form" action="/admin/subcategories/store" method="post" >
            @csrf
            <x-form.input name="name"/>
            <x-form.input name="slug"/>
            <x-dashboard.category-dropdown />
            <x-form.button >
                Submit
            </x-form.button>
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
