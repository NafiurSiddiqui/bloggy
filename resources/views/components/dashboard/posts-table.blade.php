@props(['posts', 'filteredByCategory', 'postsByAdmin'])

{{-- @dd($postsByAdmin) --}}

<div class="relative overflow-x-auto shadow-md rounded-md ">

    <x-table>

        <x-slot:thead>
            <tr>
                <x-th th-title="Select" />
                <x-th sort-by="title" th-title="title" />
                <x-th th-title="Category" />
                <x-th th-title="Author" />
                <x-th th-title="Status" />
                <x-th th-title="Published" />
                <x-th th-title="Actions" />

            </tr>
        </x-slot:thead>

        <form id="delete-multiple-posts" action="{{ route('posts.delete.selected') }}" method="post">
            @csrf
            @method('DELETE')

            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($posts as $post)
                    <x-tr>
                        <x-td>

                            <x-form.checkbox input-name="bulk_delete_selection[]" id="bulk_delete_selection"
                                class="post-delete-checkbox" value="{{ $post->id }}" checkbox-only />
                        </x-td>
                        <x-td>
                            <x-text-link href="/posts/{{ $post->slug }}">
                                {{ $post->title }}
                            </x-text-link>
                        </x-td>

                        <x-td>
                            @if ($post->category)
                                <x-text-link href="/categories/{{ $post->category->slug }}">
                                    {{ $post->category->title }}
                                </x-text-link>
                            @else
                                <x-text-link href="/categories/uncategorized">
                                    uncategorized
                                </x-text-link>
                            @endif

                        </x-td>

                        <x-td>
                            <x-text-link href="/author/{{ $post->author->id }}/posts">
                                {{ $post->author->name }}
                            </x-text-link>

                        </x-td>
                        <x-td>
                            <x-status-label :post="$post" />
                        </x-td>
                        <x-td>
                            {{ $post->updated_at->diffForHumans() }}
                        </x-td>
                        <x-td>
                            <a href="/admin/post/{{ $post->slug }}/edit"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
            {{-- @endif --}}


        </form>
    </x-table>
</div>
