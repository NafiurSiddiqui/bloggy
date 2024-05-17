<x-dashboard.dashboard-layout>
    <x-slot:heading>
        Sub-Categories
    </x-slot:heading>

    @if ($subcategories_are_empty)
        <div class="space-y-4 my-2">
            <p>No Subcategories created yet</p>

            <x-secondary-button link href="/admin/subcategories/create">
                Create a Subcategory
            </x-secondary-button>
        </div>
    @else
        <x-dashboard.index-actions singular-type="subcategory" plural-type="subcategories"
            multiple-delete-form-action-path="delete-multiple-subcategories"
            delete-form-action-route="admin.subcategories.delete.all" path-to-creation="/admin/subcategories/create" />

        <x-dashboard.categories-table :items="$subcategories" is_subcategories edit-href="admin/subcategories" />
        <x-pagination-holder :item="$subcategories" />
    @endif
</x-dashboard.dashboard-layout>



<script>
    window.addEventListener('load', function() {
        const subCategoryCheckBoxes = document.querySelectorAll('.subcategory-delete-checkbox');
        const submitBtn = document.querySelector('.delete-selected-subcategories-btns');
        const SUBCATEGORIES_SESSION_ITEM = 'some_subcategories_selected';
        let someAreChecked = [...subCategoryCheckBoxes].some(input => input.checked);

        const anyChecked = sessionStorage.getItem(SUBCATEGORIES_SESSION_ITEM) === 'true';

        if (anyChecked && someAreChecked) {
            submitBtn.classList.remove('hidden');
            console.log('says checked');
        } else {
            submitBtn.classList.add('hidden');
            console.log('the fuck!');
            sessionStorage.removeItem(SUBCATEGORIES_SESSION_ITEM);
        }

        // Add event listener to each checkbox for change
        subCategoryCheckBoxes.forEach(checkbox => checkbox.addEventListener('change', function() {
            sessionStorage.setItem(SUBCATEGORIES_SESSION_ITEM, [...subCategoryCheckBoxes].some(
                box => box
                .checked));

            if (this.checked) {
                submitBtn.classList.remove('hidden');
            } else {
                // Check if any other checkbox is checked
                if (![...subCategoryCheckBoxes].some(box => box.checked)) {
                    submitBtn.classList.add('hidden');
                    sessionStorage.removeItem(SUBCATEGORIES_SESSION_ITEM);
                }
            }
        }));

    })
</script>
