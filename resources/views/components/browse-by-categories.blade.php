@props(['categories'])

<x-panel class="w-full space-y-4 px-2 bg-white dark:bg-darkPostCard py-4">
    <div class="flex flex-col justify-center items-center">
        <h3 class="text-2xl text-lightSectionHeader font-bold dark:text-zinc-300">
            Browse by Category
        </h3>
        <x-hr />
    </div>

    <div class="flex justify-start flex-wrap gap-2">
        @if ($categories->isNotEmpty())
            @foreach ($categories as $category)
                <x-labels.category :category="$category" />
            @endforeach
        @endif
    </div>
</x-panel>
