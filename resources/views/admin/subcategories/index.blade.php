<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Sub-Categories
    </x-slot:heading>

    <x-panel>
{{--        <h2 class="bg-gray-100 px-2 font-bold text-gray-600">Sub-Categories</h2>--}}

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
            <p class="bg-gray-100 p-2">Render table</p>
        @endif
    </x-panel>
</x-dashboard.dashboard-layout>
