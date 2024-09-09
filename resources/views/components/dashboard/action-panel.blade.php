@props(['screenSm' => false])

@if ($screenSm)
    {{-- used for smaller screens --}}
    <div x-data="{ open: false }">
        <x-panel class="lg:hidden px-2 py-3 fixed bottom-0 w-full left-0 bg-lightText-100 z-[10000]">
            <h2
                class="mb-3 font-semibold text-lightText-500 border-b dark:border-zinc-700 border-zinc-300 dark:text-lightText-300 ">
                Actions</h2>
            <div :class="{ 'block': open, 'hidden': !open, 'flex': open }"
                class="hidden flex-col border-2 dark:border-zinc-800 p-4 bg-zinc-100 dark:bg-darkPostCard">
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
@else
    {{-- larager screens --}}
    <aside class="fixed right-0 top-[25%] hidden lg:block">
        <x-panel class="px-2 py-3  bg-lightText-100/30 z-[10000] min-h-[20rem]">
            <h2
                class="mb-3 font-semibold text-lightText-500 border-b border-zinc-300 dark:border-zinc-700 dark:text-lightText-300">
                Actions</h2>
            <div class="flex flex-col border-2 p-4 bg-lightText-100 dark:border-zinc-700 dark:bg-darkPostCard">
                {{ $slot }}
            </div>

            <div class="flex justify-between items-center mt-8">
                <x-secondary-button class="mt-4 w-full" link href="/admin/posts">
                    Cancel
                </x-secondary-button>
            </div>
        </x-panel>
    </aside>
@endif
