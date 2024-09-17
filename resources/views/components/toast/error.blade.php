@props(['lists' => false, 'message' => 'default', 'errorBag'])


@if ($lists)
    <ul x-data="{ show: true }" x-show="show"
        class="bg-rose-300 dark:text-green-400 font-medium mb-4 p-4 rounded text-rose-800 text-sm my-4">
        @foreach ($errorBag->all() as $error)
            <li class="text-center">{{ $error }}</li>
        @endforeach
    </ul>
@else
    <div x-data="{ show: true }" x-show="show"
        class="bg-rose-300 dark:text-green-400 font-medium mb-4 p-4 rounded text-rose-800 text-sm my-4">
        <p class="text-center">{{ $message }}</p>
    </div>
@endif
