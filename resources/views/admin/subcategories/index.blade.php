<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Sub-Categories
    </x-slot:heading>

    <x-panel>


        @if($subcategories_are_empty)
            <div class="space-y-4 my-2">
                <p>No Subcategories created yet</p>

                <x-secondary-button link href="/admin/subcategories/create">
                    Create a Subcategory
                </x-secondary-button>
            </div>
        @else
            <div class="my-2 flex justify-end">
                <x-secondary-button link href="/admin/subcategories/create">
                    Create a Subcategory
                </x-secondary-button>
            </div>
            <x-dashboard.table :items="$subcategories" is_subcategories edit-href="admin/subcategories" />
        @endif
    </x-panel>
</x-dashboard.dashboard-layout>
