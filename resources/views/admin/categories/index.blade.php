<x-dashboard.dashboard-layout>
    <x-slot:heading>Categories </x-slot:heading>
{{--    Show table of categories, edit,delete, no. of posts,--}}
{{--    maybe you wanna show the subcategories here rather than a separate page.--}}

<div class="mt-6">
    <x-panel>
        @if($categories_are_empty)
            <div class="space-y-4 my-2">
                <p>No categories created yet</p>
                <x-secondary-button href="/admin/categories/create">
                    Create a Category
                </x-secondary-button>
            </div>
        @else
            <div class="my-2 flex justify-end">

                <x-secondary-button link href="/admin/categories/create">
                    Create a Category
                </x-secondary-button>
            </div>
            <p class="bg-gray-100 p-2">Render table</p>
        @endif
    </x-panel>
</div>

</x-dashboard.dashboard-layout>
