<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Create a Sub-category
    </x-slot:heading>

    <x-panel>
        <form class="subcategory-form" action="/admin/subcategories/store" method="post">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-dashboard.category-dropdown />
            <x-form.action-buttons secondary-btn-href="/admin/subcategories" submit-label="Save" />
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
