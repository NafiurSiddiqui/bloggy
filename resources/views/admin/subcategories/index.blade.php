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
        {{-- <div class="my-2 flex justify-end">
            <x-secondary-button link href="/admin/subcategories/create">
                Create a Subcategory
            </x-secondary-button>
        </div> --}}

        <x-dashboard.index-actions singular-type="subcategory" plural-type="subcategories"
            multiple-delete-form-action-path="delete-multiple-subcategories"
            delete-form-action-route="admin.subcategories.delete.all" path-to-creation="/admin/subcategories/create" />

        <x-dashboard.categories-table :items="$subcategories" is_subcategories edit-href="admin/subcategories" />
        <x-pagination-holder :item="$subcategories" />
    @endif
</x-dashboard.dashboard-layout>



<script>
    const subCategoryCheckBoxes = document.querySelectorAll('.subcategory-delete-checkbox');
    const submitBtn = document.querySelector('.delete-selected-subcategories-btns');


    function checkAnyCheckbox() {
        // Loop through all postCheckBoxes
        for (const checkbox of subCategoryCheckBoxes) {
            if (checkbox.checked) {
                submitBtn.classList.remove('hidden');
                return; // Exit the loop if at least one checkbox is checked
            }
        }
        submitBtn.classList.add('hidden');
    }

    // Add event listener to each checkbox for change
    subCategoryCheckBoxes.forEach(checkbox => checkbox.addEventListener('change', checkAnyCheckbox));
</script>
