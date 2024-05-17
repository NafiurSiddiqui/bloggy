@props(['subcategories', 'edit-href' => ''])


<div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-md">
    <x-table id="subcategories_table">
        <x-slot:thead>
            <tr>
                <x-th>Select</x-th>
                <x-th>
                    title
                </x-th>
                <x-th>
                    created
                </x-th>
                <x-th>
                    Categories
                </x-th>
                <x-th>
                    Posts
                </x-th>
                <x-th>
                    Action
                </x-th>
            </tr>
        </x-slot:thead>


        <form id="delete-multiple-subcategories" action="{{ route('admin.subcategories.delete.selected') }}"
            method="post">
            @csrf
            @method('DELETE')

            <tbody>
                @foreach ($subcategories as $subcategory)
                    <x-tr>
                        <x-td>

                            @if ($subcategory->title == 'Uncategorized')
                                <x-form.checkbox input-name="bulk_delete_selection" id="bulk_delete_selection"
                                    class="subcategory-delete-checkbox    !cursor-auto" checkbox-only disabled />
                            @else
                                <x-form.checkbox input-name="bulk_delete_selection[]" id="bulk_delete_selection"
                                    class="subcategory-delete-checkbox" value="{{ $subcategory->id }}" checkbox-only />
                            @endif
                        </x-td>
                        <x-td id="table-row-uncategorized">

                            <x-text-link href="/subcategories/{{ $subcategory->slug }}">
                                {{ $subcategory->title }}
                            </x-text-link>
                        </x-td>

                        <x-td>
                            {{ $subcategory->updated_at->diffForHumans() }}
                        </x-td>
                        <x-td>
                            <x-text-link href="/subcategories/{{ $subcategory->slug }}">
                                {{ $subcategory->category != null ? $subcategory->category->title : 'uncategoriezed' }}
                            </x-text-link>

                        </x-td>
                        <x-td>
                            {{ $subcategory->posts->count() }}
                        </x-td>
                        <x-td>
                            @unless ($subcategory->slug == 'uncategorized')
                                <a href="/{{ $editHref }}/{{ $subcategory->id }}/edit"
                                    class=" font-medium w-full text-blue-600 dark:text-blue-500 hover:underline hover:text-blue-600">Edit</a>
                            @endunless

                        </x-td>
                    </x-tr>
                @endforeach

            </tbody>
        </form>
    </x-table>
</div>
