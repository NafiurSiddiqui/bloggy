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
        <x-danger-button x-data=""
            x-on:click="$dispatch('open-modal','confirm-delete')">Delete</x-danger-button>
    @endif
    <div class="flex justify-end items-center space-x-3">
        <x-secondary-button class="mt-4" link :href="$secondaryBtnHref">
            {{ $secondaryBtnLabel ?? 'Cancel' }}
        </x-secondary-button>
        <x-form.button>
            {{ $submitLabel }}
        </x-form.button>
    </div>
    <x-modal-delete :type="$type" />
</div>
