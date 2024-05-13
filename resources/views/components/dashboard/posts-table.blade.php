@props(['posts'])

<div class="relative overflow-x-auto shadow-md ">

    <x-table>
        <tr>
            <x-th>Select</x-th>
            <x-th>Title</x-th>
            <x-th>Category</x-th>
            <x-th>Author</x-th>
            <x-th>Status</x-th>
            <x-th>Published At</x-th>
            <x-th>Action</x-th>

        </tr>
        </thead>

        <form id="delete-multiple-posts" action="{{ route('posts.delete.multiple') }}" method="post">
            @csrf
            @method('DELETE')

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <x-td>
                            <input type="checkbox" name="bulk_delete_selection[]" id="bulk_delete_selection"
                                class="post-delete-checkbox" value="{{ $post->id }}">
                        </x-td>
                        <x-td>
                            <x-text-link href="/posts/{{ $post->slug }}">
                                {{ $post->title }}
                            </x-text-link>
                        </x-td>

                        <x-td>
                            <x-text-link href="/categories/{{ $post->category->slug }}">
                                {{ $post->category->title }}
                            </x-text-link>

                        </x-td>
                        <x-td>
                            <x-status-label :post="$post" />
                        </x-td>
                        <x-td>

                            <x-text-link href="/author/{{ $post->author->id }}/posts">
                                {{ $post->author->name }}
                            </x-text-link>
                        </x-td>
                        <x-td>
                            {{ $post->updated_at->diffForHumans() }}
                        </x-td>
                        <x-td>
                            <a href="/admin/post/{{ $post->slug }}/edit"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </x-td>
                    </tr>
                @endforeach
            </tbody>
        </form>
    </x-table>
</div>
