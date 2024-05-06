<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Sub-Categories
    </x-slot:heading>

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
            <x-dashboard.categories-table :items="$subcategories" is_subcategories edit-href="admin/subcategories" />
        <x-pagination-holder :item="$subcategories" />
    @endif


</x-dashboard.dashboard-layout>
