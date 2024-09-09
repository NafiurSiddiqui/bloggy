@props(['editRoute', 'deleteRoute', 'comment' => null, 'reply' => null])

@if (auth()->user()?->id === ($comment ? $comment->user_id : $reply->user_id) || auth()->user()?->role === 'admin')
    <div class="flex -top-4 items-start  relative" x-data="{ open: false }" x-on:click.away="open = false">
        <div class="border hidden border-gray-300 dark:border-zinc-700 flex-col justify-center space-y-1 py-2 rounded 
                        mt-4 mr-1"
            :class="{ 'flex': open, 'hidden': !open }" x-show="open">
            @if (auth()->user()->role !== 'admin' || auth()->user()?->id === ($comment ? $comment->user_id : $reply->user_id))
                <form action="{{ $editRoute }}" method="get" class="w-full">
                    <button
                        class="p-2 hover:bg-blue-50 hover:text-blue-500 
                                        dark:hover:text-darkTextHover-600 
                                        dark:hover:bg-darkBlack w-full">Edit</button>
                </form>
            @endif

            <div>
                <form id="form-delete" action="{{ $deleteRoute }}" method="post" class="">
                    @csrf
                    @method('DELETE')
                    <x-danger-button x-data="" x-on:click="$dispatch('open-modal','confirm-delete')"
                        label="Delete" class="h-full w-full inline dark:hover:bg-darkBlack p-2" />
                </form>
                <x-modal-delete message="You sure want to delete this comment?" />
            </div>
        </div>
        <div class="relative flex rounded text-gray-400  hover:bg-gray-100 dark:hover:bg-darkBlack hover:text-gray-500">
            <button class=" py-1 px-2 text-xl !leading-none" @click="open = true">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
        </div>
    </div>
@endif
