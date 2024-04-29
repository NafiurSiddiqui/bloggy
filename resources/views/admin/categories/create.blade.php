<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Create a Category
    </x-slot:heading>

    <x-panel>
        <form action="/admin/categories/store" method="post">
            @csrf
            <x-form.input name="name"/>
            <x-form.input name="slug"/>
            <x-form.button>
                Submit
            </x-form.button>
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
