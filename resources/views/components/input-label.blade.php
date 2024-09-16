@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-lightText-700 dark:text-darkText-300']) }}>
    {{ $value ?? $slot }}
</label>
