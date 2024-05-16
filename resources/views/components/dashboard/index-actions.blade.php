@props([
    'delete-form-action-route',
    'singular-type',
    'plural-type',
    'multiple-delete-form-action-path',
    'path-to-creation',
])

{{-- similar actiona bar for admin/posts, admin/categories, admin/subcategories --}}
{{-- @dd($deleteFormActionPath) --}}

<div class="my-4 mb-8 gap-8 flex justify-between md:justify-end lg:justify-end flex-wrap">
    <div>
        <form id="form-delete" action="{{ route($deleteFormActionRoute) }}" method="post">
            @csrf
            @method('DELETE')
            <x-danger-button x-data="" x-on:click="$dispatch('open-modal','confirm-delete')"
                label="Delete All" />
        </form>
        <x-modal-delete message="You sure want to delete all {{ $pluralType }} ?" />
    </div>
    <div class="delete-selected-{{ $pluralType }}-btns text-gray-400 hidden" x-data="{ show: false }">
        <x-danger-button label="Delete Selected {{ $pluralType }}" />
        <x-modal-delete message="You sure want to delete these {{ $pluralType }}?"
            form-id="{{ $multipleDeleteFormActionPath }}" />
    </div>
    <x-secondary-button link href="{{ $pathToCreation }}">
        Create a {{ $singularType }}
    </x-secondary-button>
</div>
