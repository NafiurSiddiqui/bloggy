<x-dashboard.dashboard-layout>
    <x-slot:heading>Categories </x-slot:heading>
    {{--    Show table of categories, edit,delete, no. of posts, --}}
    {{--    maybe you wanna show the subcategories here rather than a separate page. --}}

    <div class="mt-6">

        @if ($categories_are_empty)
            <x-panel>
                <div class="space-y-4 my-2">
                    <p>No categories created yet</p>
                    <x-secondary-button link href="/admin/categories/create">
                        Create a Category
                    </x-secondary-button>
                </div>
            </x-panel>
        @else
            <x-dashboard.index-actions singular-type="category" plural-type="categories"
                multiple-delete-form-action-path="delete-multiple-categories"
                delete-form-action-route="admin.categories.delete.all" path-to-creation="/admin/categories/create" />


            <x-dashboard.categories-table :categories="$categories" edit-href="admin/categories" />

            <x-pagination-holder :item="$categories" />
        @endif


    </div>

</x-dashboard.dashboard-layout>


<script>
    window.addEventListener('load', function() {
        const categoryCheckboxes = document.querySelectorAll('.category-delete-checkbox');
        const submitBtn = document.querySelector('.delete-selected-categories-btns');
        const CATEGORIES_SESSION_ITEM = 'some_subcategories_selected';

        let someAreChecked = [...categoryCheckboxes].some(input => input.checked);

        const anyChecked = sessionStorage.getItem(CATEGORIES_SESSION_ITEM) === 'true';

        if (anyChecked && someAreChecked) {
            submitBtn.classList.remove('hidden');
            console.log('says checked');
        } else {
            submitBtn.classList.add('hidden');
            console.log('the fuck!');
            sessionStorage.removeItem(CATEGORIES_SESSION_ITEM);
        }

        // Add event listener to each checkbox for change
        categoryCheckboxes.forEach(checkbox => checkbox.addEventListener('change', function() {
            sessionStorage.setItem(CATEGORIES_SESSION_ITEM, [...categoryCheckboxes].some(
                box => box
                .checked));

            if (this.checked) {
                submitBtn.classList.remove('hidden');
            } else {
                // Check if any other checkbox is checked
                if (![...categoryCheckboxes].some(box => box.checked)) {
                    submitBtn.classList.add('hidden');
                    sessionStorage.removeItem(CATEGORIES_SESSION_ITEM);
                }
            }
        }));

    })
</script>
