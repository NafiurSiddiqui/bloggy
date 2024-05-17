<x-dashboard.dashboard-layout>
    <x-slot:heading>All Posts</x-slot:heading>

    @if (isset($posts) && count($posts) > 0)
        {{-- <div class="my-4 mb-8 gap-8 flex justify-between md:justify-end lg:justify-end flex-wrap">
            <div>
                <form id="form-delete" action="/admin/posts/delete-all" method="post">
                    @csrf
                    @method('DELETE')
                    <x-danger-button x-data="" x-on:click="$dispatch('open-modal','confirm-delete')"
                        label="Delete All" />
                </form>
                <x-modal-delete message="You sure want to delete all posts?" />
            </div>
            <div class="delete-selected-posts-btns text-gray-400 hidden" x-data="{ show: false }">
                <x-danger-button label="Delete Selected Posts" />
                <x-modal-delete message="You sure want to delete these posts?" form="delete-multiple-posts" />
            </div>
        </div> --}}


        <x-dashboard.index-actions singular-type="post" plural-type="posts"
            multiple-delete-form-action-path="delete-multiple-posts" delete-form-action-route="admin.posts.delete.all"
            path-to-creation="/admin/post/create" />

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


<script>
    window.addEventListener('load', function() {
        const categoryCheckboxes = document.querySelectorAll('.post-delete-checkbox');
        const submitBtn = document.querySelector('.delete-selected-posts-btns');
        const POSTS_SESSION_ITEM = 'some_posts_selected';

        let someAreChecked = [...categoryCheckboxes].some(input => input.checked);

        const anyChecked = sessionStorage.getItem(POSTS_SESSION_ITEM) === 'true';

        if (anyChecked && someAreChecked) {
            submitBtn.classList.remove('hidden');
            console.log('says checked');
        } else {
            submitBtn.classList.add('hidden');
            console.log('the fuck!');
            sessionStorage.removeItem(POSTS_SESSION_ITEM);
        }

        // Add event listener to each checkbox for change
        categoryCheckboxes.forEach(checkbox => checkbox.addEventListener('change', function() {
            sessionStorage.setItem(POSTS_SESSION_ITEM, [...categoryCheckboxes].some(
                box => box
                .checked));

            if (this.checked) {
                submitBtn.classList.remove('hidden');
            } else {
                // Check if any other checkbox is checked
                if (![...categoryCheckboxes].some(box => box.checked)) {
                    submitBtn.classList.add('hidden');
                    sessionStorage.removeItem(POSTS_SESSION_ITEM);
                }
            }
        }));

    })
</script>
