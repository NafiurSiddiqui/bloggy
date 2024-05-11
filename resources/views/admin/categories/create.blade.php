<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Create a Category
    </x-slot:heading>

    <x-panel>
        <form action="/admin/categories/store" method="post">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.action-buttons secondary-btn-href="/admin/categories" submit-label="Save" />
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
