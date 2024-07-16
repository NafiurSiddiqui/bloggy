@props(['posts', 'filteredByCategory', 'postsByAdmin'])

{{-- @dd($postsByAdmin) --}}

<div class="relative overflow-x-auto shadow-md rounded-md ">

    <x-table>

        <x-slot:thead>
            <tr>
                <x-th th-title="Select" page="posts" />
                <x-th sort-by="title" th-title="title" page="posts" />
                <x-th th-title="category" page="posts" />
                <x-th th-title="Author" page="posts" />
                <x-th th-title="Status" page="posts" />
                <x-th sort-by="updated_at" th-title="Published" page="posts" />
                <x-th th-title="Actions" page="posts" />

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
                            <x-text-link href="/post/{{ $post->slug }}">
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
                            <x-text-link
                                href="{{ route('author.show.posts', [
                                    'author' => $post->author,
                                ]) }}">
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
