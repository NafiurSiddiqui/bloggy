{{-- used for smaller devices --}}
<div x-data={open:false}>
    <x-panel class="lg:hidden px-2 py-3 fixed bottom-0 w-full left-0 bg-stone-200 z-[10000]">
        <h2 class="mb-3 font-semibold text-gray-500 border-b border-gray-300 ">Actions</h2>
        <div :class="{ 'block': open, 'hidden': !open, 'flex': open }"
            class="hidden flex-col border-2 rounded p-4 bg-stone-300">
            {{ $slot }}
        </div>

        <div class="flex justify-between items-center">
            <x-secondary-button class="mt-4" link href="/admin/posts">
                Cancel
            </x-secondary-button>
            <x-icons.hamburger />
        </div>
    </x-panel>
</div>
