@props(['type-message', 'message'])



@if (isset($typeMessage))
    <div x-data="{ show: true }" x-show="show"
        class="border-2 border-blue-500 shadow-lg bg-blue-500 font-semibold fixed right-3 bottom-5 p-4 rounded transition duration-300 ease-in-out flex justify-between items-center gap-4"
        @click.outside="show = false">

        <p class=" text-gray-100 ">{{ isset($message) ? $message : 'Supposed to be informative' }}</p>
        <button @click="show = false">
            <i
                class="fas fa-times text-blue-200 text-xl hover:text-gray-
        600 transition duration-300 ease-in-out px-2 py-1 rounded-md hover:text-gray-500 hover:bg-gray-200 cursor-pointer"></i>
        </button>
    </div>
@endif
