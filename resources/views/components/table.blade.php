<table {{ $attributes->merge(['class' => 'w-full divide-y divide-gray-200']) }}>
    <thead class="bg-gray-50 dark:bg-gray-800 ">
        {{ $thead }}
    </thead>
    {{ $slot }}
</table>
