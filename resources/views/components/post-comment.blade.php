@props(['comment'])

<x-panel>
    <article class="flex justify-between relative">
        <di class="flex space-x-2">
            <div class="flex-shrink-0">
                <img src="https://i.pravatar.cc/60/u={{ $comment->user_id }}" alt="" class="rounded-full"
                    width="60" height="60">
            </div>
            <div class="space-y-4">
                <header>
                    <h3 class="font-bold">
                        {{ $comment->author->name }}

                    </h3>
                    <p class="text-xs">Posted
                        <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                    </p>
                </header>

                <p>
                    {{ $comment->body }}
                </p>
            </div>
        </di>
        <div class="flex -top-4 items-start  relative" x-data="{ open: false }" x-on:click.away="open = false">
            <div class="border border-gray-300 flex flex-col py-2 rounded 
            mt-4 mr-1" x-show="open">
                <button class="p-2 hover:bg-blue-50 hover:text-blue-500">Edit</button>
                <button class="hover:bg-rose-50 p-2 text-rose-500">Delete</button>
            </div>
            <div class="relative flex rounded text-gray-400  hover:bg-gray-100 hover:text-gray-500">
                <button class=" py-1 px-2 text-xl !leading-none" @click="open = true">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
            </div>
        </div>
    </article>
</x-panel>
