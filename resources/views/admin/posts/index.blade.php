<x-dashboard.dashboard-layout>
    <x-slot:heading>All Posts</x-slot:heading>

    <x-panel>
        <div class="flex flex-col gap-2 ">
            <form action="/admin/posts">

                <x-searchbar />
            </form>

            <form action="/admin/posts" method="get" class="border border-gray-200 rounded p-2">
                <fieldset class="flex flex-wrap gap-4">
                    <legend class="text-gray-400 font-semibold">Filter by -</legend>

                    <x-category-filter />
                    <x-dashboard.status-filter />
                    <x-dashboard.admin-filter />
                </fieldset>


                <div class="mt-4 border py-2">
                    <x-secondary-button type="submit">Filter</x-secondary-button>
                    <x-secondary-button link href="/admin/posts">Reset</x-secondary-button>
                </div>
            </form>
        </div>
    </x-panel>
    @if (isset($posts) && count($posts) > 0)
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
    @elseif(request()->query() > 0)
        <p class="rounded mt-4 text-center py-4 font-semibold text-gray-500 border-2"> Nothing found </p>
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
            // console.log('says checked');
        } else {
            submitBtn.classList.add('hidden');
            // console.log('the fuck!');
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
