@props(['categories', 'edit-href' => ''])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-md">
    <x-table id="'categories_table'">
        <x-slot:thead>
            <tr>
                <x-th th-title="Select" page="categories" />
                <x-th sort-by="title" th-title="title" page="categories" />
                <x-th sort-by="updated_at" th-title="created" page="categories" />
                <x-th th-title="subcategories" page="categories" />
                <x-th th-title="Posts" page="categories" />
                <x-th th-title="Action" page="categories" />

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
                            <x-text-link href="/admin/subcategories?filter[slug]={{ $category->slug }}">
                                {{ $category->subcategories->count() }}
                            </x-text-link>

                        </x-td>
                        <x-td>
                            {{ $category->posts->count() }}
                        </x-td>
                        <x-td>
                            @unless ($category->slug == 'uncategorized')
                                <x-text-link href="/{{ $editHref }}/{{ $category->id }}/edit">Edit</x-text-link>
                            @endunless

                        </x-td>
                    </x-tr>
                @endforeach

            </tbody>
        </form>
    </x-table>
</div>
