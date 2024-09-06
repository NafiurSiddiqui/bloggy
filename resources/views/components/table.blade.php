<table
    {{ $attributes->merge(['class' => 'w-full divide-y divide-zinc-200 dark:divide-zinc-700 dark:bg-darkPostCard dark:text-gray-200 dark:border-zinc-700']) }}>
    <thead class="bg-gray-50 dark:bg-darkPostCard dark:text-gray-200 dark:border-zinc-700">
        {{ $thead }}
    </thead>
    {{ $slot }}
</table>
