<x-dashboard.dashboard-layout>
    <x-slot:heading>Categories </x-slot:heading>
{{--    Show table of categories, edit,delete, no. of posts,--}}
{{--    maybe you wanna show the subcategories here rather than a separate page.--}}

<div class="mt-6">

        @if($categories_are_empty)
        <x-panel>
            <div class="space-y-4 my-2">
                <p>No categories created yet</p>
                <x-secondary-button href="/admin/categories/create">
                    Create a Category
                </x-secondary-button>
            </div>
    </x-panel>
        @else
            <div class="my-2 flex justify-end">

                <x-secondary-button link href="/admin/categories/create">
                    Create a Category
                </x-secondary-button>
            </div>

            <x-dashboard.table :items="$categories" edit-href="admin/categories" />

        @endif

    <div class="mt-4">
        {{$categories->links()}}
    </div>

</div>

</x-dashboard.dashboard-layout>
