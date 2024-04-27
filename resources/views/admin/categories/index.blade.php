<x-dashboard.dashboard-layout>
    <x-slot:heading>Categories and Subcategories</x-slot:heading>
{{--    Show table of categories, edit,delete, no. of posts,--}}
{{--    maybe you wanna show the subcategories here rather than a separate page.--}}

{{--    Lez make two table here dude!--}}
{{--    - create should render a new view for creation? or maybe a modal?--}}
{{--    - redirect user back to this page if you are not using a modal.--}}

{{--    Lez go with a modal first --}}
{{-- <div class="flex space-x-4 my-4">--}}

{{--     <x-modal btn-label="create a category">A modal fafasf</x-modal>--}}
{{--     <x-modal btn-label="create a sub-category">Subcategory form</x-modal>--}}
{{-- </div>--}}

<div class="space-y-4">
    <x-panel>
        <h2 class="bg-gray-100 px-2 font-bold text-gray-600">Categories</h2>

        {{--                        Right now, if there is error on submit, it redirects back to the categories page, should not be like that --}}
        @if($categories_are_empty)
            <div class="space-y-4 my-2">
                <p>No categories created yet</p>
                <x-modal btn-label="create a category" >
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
                </x-modal>
            </div>
        @else
            <div class="my-2 flex justify-end">
                <x-modal btn-label="create a category" >
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
                </x-modal>
            </div>
            <p>Render table</p>
        @endif
    </x-panel>
    <x-panel>
        <h2 class="bg-gray-100 px-2 font-bold text-gray-600">Sub-Categories</h2>
        @if($subcategories_are_empty)
            <div class="space-y-4 my-2">
                <p>No Subcategories created yet</p>
                <x-modal btn-label="create a subcategory">
                    <x-panel>
                    <form action="/admin/subcategories/store" method="post">
                        @csrf
                        <x-form.input name="name"/>
                        <x-form.input name="slug"/>
                        <x-dashboard.category-dropdown />
                        <x-form.button>
                            Submit
                        </x-form.button>
                    </form>
                    </x-panel>
                </x-modal>
            </div>
        @else
            <div class="my-2 flex justify-end">
                <x-modal btn-label="create a subcategory">
                    <x-panel>
{{--                        Right now, if there is error on submit, it redirects back to the categories page, should not be like that --}}
                        <form action="/admin/subcategories/store" method="post">
                            @csrf
                            <x-form.input name="name"/>
                            <x-form.input name="slug"/>
                            <x-dashboard.category-dropdown />
                            <x-form.button>
                                Submit
                            </x-form.button>
                        </form>
                    </x-panel>
                </x-modal>
            </div>
            <p>Render table</p>
        @endif
    </x-panel>
</div>

</x-dashboard.dashboard-layout>
