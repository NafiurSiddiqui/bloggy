@props(['submit'])

@if (isset($submit))
    <button type="submit" form="form-delete"
        class="border border-rose-200 dark:text-rose-500 font-medium hover:text-rose-600  ms-3 px-4 rounded text-rose-400">Delete</button>
@else
    <span
        {{ $attributes->merge(['class' => 'font-medium  text-rose-400 dark:text-rose-500 hover:underline hover:text-rose-600 cursor-pointer']) }}>Delete</span>
@endif
