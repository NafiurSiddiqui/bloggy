@props(['delete-form-action-path', 'type', 'multiple-delete-form-action-path', 'path-to-creation'])

{{-- similar actiona bar for admin/posts, admin/categories, admin/subcategories --}}


<div class="my-4 mb-8 gap-8 flex justify-between md:justify-end lg:justify-end flex-wrap">
    <div>
        <form id="form-delete" action="{{ $deleteFormActionPath }}" method="post">
            @csrf
            @method('DELETE')
            <x-danger-button x-data="" x-on:click="$dispatch('open-modal','confirm-delete')"
                label="Delete All" />
        </form>
        <x-modal-delete message="You sure want to delete all {{ $type }}s ?" />
    </div>
    <div class="delete-selected-posts-btns text-gray-400 hidden" x-data="{ show: false }">
        <x-danger-button label="Delete Selected {{ $type }}s" />
        <x-modal-delete message="You sure want to delete these {{ $type }}s?" :form="$multipleDeleteFormActionPath" />
    </div>
    <x-secondary-button link href="{{ $pathToCreation }}">
        Create a {{ $type }}
    </x-secondary-button>
</div>
