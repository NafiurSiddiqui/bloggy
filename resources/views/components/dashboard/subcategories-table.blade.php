@props(['subcategories', 'category', 'edit-href' => ''])

{{-- {{ dd($subcategories) }} --}}

<div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-md">
    <x-table id="subcategories_table">
        <x-slot:thead>
            <tr>
                <x-th th-title="Select" page="subcategories" />
                <x-th sort-by="title" th-title="title" page="subcategories" />
                <x-th sort-by="updated_at" th-title="created" page="subcategories" />
                <x-th th-title="categories" page="subcategories" />
                <x-th th-title="Posts" page="subcategories" />
                <x-th th-title="Action" page="subcategories" />
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

                            <x-text-link href="/category/{{ $subcategory->category->slug }}/{{ $subcategory->slug }}">
                                {{ $subcategory->title }}
                            </x-text-link>
                        </x-td>

                        <x-td>
                            {{ $subcategory->updated_at->diffForHumans() }}
                        </x-td>
                        <x-td>
                            <x-text-link href="/categories/{{ $subcategory->category->slug }}">
                                {{ $subcategory->category != null ? $subcategory->category->title : 'uncategoriezed' }}
                            </x-text-link>
                        </x-td>
                        <x-td>
                            {{ $subcategory->posts->count() }}
                        </x-td>
                        <x-td>
                            @unless ($subcategory->slug == 'uncategorized')
                                <x-text-link href="/{{ $editHref }}/{{ $subcategory->id }}/edit">Edit</x-text-link>
                            @endunless

                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </form>
    </x-table>
</div>
