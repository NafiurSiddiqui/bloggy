@props([
    'edit' => false,
    'submit-label' => 'Submit',
    'secondary-btn-href' => '#',
    'secondary-btn' => 'Cancel',
])

<div class='flex {{ $edit ? 'justify-between' : 'justify-end' }} items-center space-x-3 mt-6'>
    @if ($edit)
        <button type="submit" form="form-delete"
            class="mt-4  font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600">Delete</button>
    @endif
    <div class="flex justify-end items-center space-x-3">
        <x-secondary-button class="mt-4" link :href="$secondaryBtnHref">
            {{ $secondaryBtnLabel ?? 'Cancel' }}
        </x-secondary-button>
        <x-form.button>
            {{ $submitLabel }}
        </x-form.button>
    </div>
</div>
