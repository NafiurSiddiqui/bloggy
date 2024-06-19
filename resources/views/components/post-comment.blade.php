@props(['comment', 'post'])

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
        {{-- edit panel --}}

        @if (auth()->user()?->id === $comment->user_id || auth()->user()?->role === 'admin')
            <div class="flex -top-4 items-start  relative" x-data="{ open: false }" x-on:click.away="open = false">
                <div class="border border-gray-300 flex flex-col justify-center py-2 rounded 
            mt-4 mr-1"
                    x-show="open">
                    @if (auth()->user()->role !== 'admin')
                        <form action="/post/{{ $post->slug }}/comment/{{ $comment->id }}/edit" method="get"
                            class="w-full">
                            <button class="p-2 hover:bg-blue-50 hover:text-blue-500 w-full">Edit</button>
                        </form>
                    @endif
                    <div class="p-2">
                        <form id="form-delete" action="/post/comment/{{ $comment->id }}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <x-danger-button x-data=""
                                x-on:click="$dispatch('open-modal','confirm-delete')" label="Delete" />
                        </form>
                        <x-modal-delete message="You sure want to delete this comment?" />
                    </div>
                </div>
                <div class="relative flex rounded text-gray-400  hover:bg-gray-100 hover:text-gray-500">
                    <button class=" py-1 px-2 text-xl !leading-none" @click="open = true">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                </div>
            </div>
        @endunless
</article>
</x-panel>
