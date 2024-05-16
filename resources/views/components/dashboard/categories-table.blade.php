@props(['items', 'is_subcategories' => false, 'edit-href' => ''])


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <x-table id="{{ $is_subcategories ? 'subcategories_table' : 'categories_table' }}">
        <x-slot:thead>
            <tr>
                <x-th>Select</x-th>
                <x-th>
                    title
                </x-th>
                <x-th>
                    Created At
                </x-th>
                <x-th>
                    Updated at
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
        </x-slot:thead>

        {{-- <button form="delete-multiple-categories">Delete Selected</button> --}}
        <form id="delete-multiple-{{ $is_subcategories ? 'subcategories' : 'categories' }}"
            action="{{ $is_subcategories ? route('admin.subcategories.delete.selected') : route('admin.categories.delete.selected') }}"
            method="post">
            @csrf
            @method('DELETE')
            {{-- <button type="submit">Delete Selected</button> --}}
            <tbody>
                @foreach ($items as $item)
                    <x-tr>
                        <x-td>

                            @if ($item->title == 'Uncategorized')
                                <x-form.checkbox input-name="bulk_delete_selection" id="bulk_delete_selection"
                                    class="{{ $is_subcategories ? 'subcategory' : 'category' }}-delete-checkbox    !cursor-auto"
                                    checkbox-only disabled />
                            @else
                                <x-form.checkbox input-name="bulk_delete_selection[]" id="bulk_delete_selection"
                                    class="{{ $is_subcategories ? 'subcategory' : 'category' }}-delete-checkbox"
                                    value="{{ $item->id }}" checkbox-only />
                            @endif
                        </x-td>
                        <x-td id="table-row-uncategorized">
                            {{ $item->title }}
                        </x-td>
                        <x-td>
                            {{ $item->created_at->diffForHumans() }}
                        </x-td>
                        <x-td>
                            {{ $item->updated_at->diffForHumans() }}
                        </x-td>
                        <x-td>

                            {{ $is_subcategories ? ($item->category != null ? $item->category->title : 'uncategoriezed') : $item->subcategories->count() }}

                        </x-td>
                        <x-td>
                            {{ $item->posts->count() }}
                        </x-td>
                        <x-td>
                            @unless ($item->slug == 'uncategorized')
                                <a href="/{{ $editHref }}/{{ $item->id }}/edit"
                                    class=" font-medium w-full text-blue-600 dark:text-blue-500 hover:underline hover:text-blue-600">Edit</a>
                            @endunless

                        </x-td>
                    </x-tr>
                @endforeach

            </tbody>
        </form>
    </x-table>
</div>
