@props(['items', 'is_subcategories' => false, 'edit-href' => ''])


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <x-table>
        <tr>
            <x-th>Select</x-th>
            <x-th>
                Name
            </x-th>
            <x-th>
                Created At
            </x-th>
            <x-th>
                Update at
            </x-th>
            <x-th>
                {{ $is_subcategories ? 'Category' : 'Subcategories count' }}
            </x-th>
            <x-th>
                Posts count
            </x-th>
            <x-th>
                Action
            </x-th>
        </tr>
        <tbody>
            @foreach ($items as $item)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->title }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->updated_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4">
                        {{--                    {{$item->subcategories->count()}} --}}
                        {{ $is_subcategories ? $item->category->title : $item->subcategories->count() }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->posts->count() }}
                    </td>
                    <td class="px-6 py-4 flex space-y-2  lg:space-y-0 flex-col lg:flex-row ">
                        <a href="/{{ $editHref }}/{{ $item->id }}/edit"
                            class=" font-medium w-full text-blue-600 dark:text-blue-500 hover:underline hover:text-blue-600">Edit</a>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </x-table>
</div>
