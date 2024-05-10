@props([
    'edit' => false,
    'submit-label' => 'Submit',
    'secondary-btn-href' => '#',
    'secondary-btn' => 'Cancel',
    'type' => '',
])

{{-- Make sure to always set the id of the delete form 'form-delete'. Otherwise, change the name both here in delete button and the form --}}

<div class='flex {{ $edit ? 'justify-between' : 'justify-end' }} items-center space-x-3 mt-6'>
    @if ($edit)
        {{-- <button type="submit" form="form-delete"
            class="mt-4  font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600">Delete</button> --}}
        <span
            class="mt-4  font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600 cursor-pointer"
            x-data="" @click="$dispatch('open-modal','confirm-delete')">Delete</span>
    @endif
    <div class="flex justify-end items-center space-x-3">
        <x-secondary-button class="mt-4" link :href="$secondaryBtnHref">
            {{ $secondaryBtnLabel ?? 'Cancel' }}
        </x-secondary-button>
        <x-form.button>
            {{ $submitLabel }}
        </x-form.button>
    </div>
    <x-modal name="confirm-delete">
        <p>You sure want to delete the {{ $type }} </p>
        <div class="flex justify-end items-center space-x-3">
            <x-secondary-button class="mt-4" @click="$dispatch('close-modal','confirm-delete')">
                {{ 'Cancel' }}
            </x-secondary-button>
            <button type="submit" form="form-delete"
                class="mt-4  font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600">Delete</button>
        </div>
    </x-modal>
</div>
