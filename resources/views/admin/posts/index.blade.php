<x-dashboard.dashboard-layout>
    <x-slot:heading>All Posts</x-slot:heading>

    @if (isset($posts) && count($posts) > 0)
        <div class="my-4 gap-8 flex justify-between md:justify-end lg:justify-end flex-wrap">
            <div>
                <form id="form-delete" action="/admin/posts/delete-all" method="post">
                    @csrf
                    @method('DELETE')
                    <x-danger-button x-data="" x-on:click="$dispatch('open-modal','confirm-delete')"
                        label="Delete All" />
                </form>
                <x-modal-delete message="You sure want to delete all posts?" />
            </div>
            <div class="multiple-selection-btns text-gray-400" x-data="{ show: false }">
                <x-danger-button label="Delete Selected Posts" />
                <x-modal-delete message="You sure want to delete these posts?" form="delete-multiple-posts" />
            </div>
        </div>
        <x-dashboard.posts-table :posts="$posts" />

        <x-pagination-holder :item="$posts" />
    @elseif(isset($categories_are_empty) && $categories_are_empty)
        <p class="mt-2 text-gray-600">No posts yet.</p>
        <a href="/admin/categories" class="underline hover:text-blue-500 my-4 block">Let's quickly create a category
            and
            subcategory first</a>
        <x-panel>
            This is to ensure data integrity of the posts and their relationships.
        </x-panel>
    @else
        <a href="/admin/post/create" class="underline hover:text-blue-500 my-4 block">Let's create a fresh post!
        </a>
    @endif
</x-dashboard.dashboard-layout>
