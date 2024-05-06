<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Create a Category
    </x-slot:heading>

    <x-panel>
        <form action="/admin/categories/store" method="post">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug"/>
            <x-form.action-buttons cancel-href="/admin/categories" submit-label="Save" />
{{--            <div class="flex justify-end items-center space-x-3">--}}
{{--                <x-secondary-button class="mt-4" link href="/admin/categories">--}}
{{--                    Cancel--}}
{{--                </x-secondary-button>--}}
{{--                <x-form.button>--}}
{{--                    Save--}}
{{--                </x-form.button>--}}
{{--            </div>--}}
        </form>
    </x-panel>
</x-dashboard.dashboard-layout>
