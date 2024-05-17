@props(['categories', 'edit-href' => ''])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-md">
    <x-table id="'categories_table'">
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
                    subcategories
                </x-th>
                <x-th>
                    Posts
                </x-th>
                <x-th>
                    Action
                </x-th>
            </tr>
        </x-slot:thead>


        <form id="delete-multiple-categories" action="{{ route('admin.categories.delete.selected') }}" method="post">
            @csrf
            @method('DELETE')

            <tbody>
                @foreach ($categories as $category)
                    <x-tr>
                        <x-td>

                            @if ($category->title == 'Uncategorized')
                                <x-form.checkbox input-name="bulk_delete_selection" id="bulk_delete_selection"
                                    class="category-delete-checkbox!cursor-auto" checkbox-only disabled />
                            @else
                                <x-form.checkbox input-name="bulk_delete_selection[]" id="bulk_delete_selection"
                                    class="category-delete-checkbox" value="{{ $category->id }}" checkbox-only />
                            @endif
                        </x-td>
                        <x-td id="table-row-uncategorized">

                            <x-text-link href="/categories/{{ $category->slug }}">
                                {{ $category->title }}
                            </x-text-link>
                        </x-td>

                        <x-td>
                            {{ $category->updated_at->diffForHumans() }}
                        </x-td>
                        <x-td>
                            <x-text-link href="/admin/subcategories/?category={{ $category->slug }}">
                                {{ $category->subcategories->count() }}
                            </x-text-link>

                        </x-td>
                        <x-td>
                            {{ $category->posts->count() }}
                        </x-td>
                        <x-td>
                            @unless ($category->slug == 'uncategorized')
                                <a href="/{{ $editHref }}/{{ $category->id }}/edit"
                                    class=" font-medium w-full text-blue-600 dark:text-blue-500 hover:underline hover:text-blue-600">Edit</a>
                            @endunless

                        </x-td>
                    </x-tr>
                @endforeach

            </tbody>
        </form>
    </x-table>
</div>
