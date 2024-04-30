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


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{--<th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" type="checkbox" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-blue-500  dark:border-gray-600" disabled>
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>--}}
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Update at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Subcategories count
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Posts count
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($categories as $category)
                       <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
{{--                           <td class="w-4 p-4">--}}
{{--                               <div class="flex items-center">--}}
{{--                                   <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">--}}
{{--                                   <label for="checkbox-table-1" class="sr-only">checkbox</label>--}}
{{--                               </div>--}}
{{--                           </td>--}}
                           <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{ $category->name }}
                           </th>
                           <td class="px-6 py-4">
                               {{$category->created_at->diffForHumans()}}
                           </td>
                           <td class="px-6 py-4">
                               {{$category->updated_at->diffForHumans()}}
                           </td>
                           <td class="px-6 py-4">
                               {{$category->subcategories->count()}}
                           </td>
                           <td class="px-6 py-4">
                               3
                           </td>
                           <td class="px-6 py-4">
                               <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                           </td>
                       </tr>
                   @endforeach

                    </tbody>
                </table>
            </div>

        @endif

    <div class="mt-4">
{{--        {{$categories->onFirstPage()}}--}}
        {{$categories->links()}}

    </div>

</div>

</x-dashboard.dashboard-layout>
