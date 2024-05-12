@props(['posts'])

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>

                            <th scope="col"
                                class="select-column px-6 py-3 text-left text-xs font-medium hidden text-gray-500 uppercase tracking-wider">
                                Select</th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                slug</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Author</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="bulk-delete-selection px-6 py-4 whitespace-nowrap hidden">
                                    <input type="checkbox" name="bulk_delete_selection" id="bulk_delete_selection">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-text-link href="/posts/{{ $post->slug }}">
                                        {{ $post->title }}
                                    </x-text-link>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $post->slug }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">

                                    <x-text-link href="/categories/{{ $post->category->slug }}">
                                        {{ $post->category->title }}
                                    </x-text-link>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-status-label :post="$post" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                    <x-text-link href="/author/{{ $post->author->id }}/posts">
                                        {{ $post->author->name }}
                                    </x-text-link>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/admin/post/{{ $post->slug }}/edit"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach


                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    const bulkDeleteCheckbox = document.getElementById('bulk_delete');
    const selectColumnHeader = document.querySelector('.select-column');
    const selectRow = document.querySelector('.bulk-delete-selection');
    let bulkDeleteIsChecked = false;

    bulkDeleteCheckbox.addEventListener('change', () => {

        bulkDeleteIsChecked = bulkDeleteCheckbox.checked;
        bulkDeleteIsChecked ? selectColumnHeader.classList.remove('hidden') : selectColumnHeader.classList
            .add('hidden');
        bulkDeleteIsChecked ? selectRow.classList.remove('hidden') : selectRow.classList
            .add('hidden');

    });
</script> --}}
