@props(['comment', 'post', 'on-edit-page' => false])


@php
    $hasReplies = $comment->replies->count() > 0;
    $replyCount = $comment->replies->count();
@endphp


<div x-data="{ reply: false, replies: {{ isset($onEditPage) ? 'true' : 'false' }} }">
    <x-panel class="!my-0">
        <article class="relative">
            <div class="flex  justify-between ">
                <div class="flex space-x-2 w-full">
                    <div class="flex-shrink-0 ">
                        <x-user-avatar sm :user="$comment->author" />
                    </div>
                    <div class="space-y-4 w-full">
                        <header>
                            <h3 class="font-bold">
                                {{ ucwords($comment->author->name) }}
                            </h3>
                            <p class="text-xs">Posted
                                <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                            </p>
                        </header>

                        <p>
                            {{ $comment->body }}
                        </p>
                        <div class="flex w-full">
                            @auth
                                <button
                                    class="reply-btn px-2 py-1 rounded-sm hover:bg-gray-100 dark:hover:bg-darkBlack text-xs"
                                    data-comment-id="{{ $comment->id }}" @click="reply = !reply">
                                    Reply
                                </button>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}"
                                    class="reply-btn px-2 py-1 rounded-sm hover:bg-gray-100 text-xs dark:hover:bg-darkBlack">
                                    Reply
                                </a>

                            @endguest
                            @if ($hasReplies)
                                <div class="flex  justify-between w-full items-center">
                                    <div class="w-full h-[1px] bg-gray-200 mr-1 "></div>
                                    <div>
                                        <button class="hover:bg-gray-100 dark:hover:bg-darkBlack flex items-center"
                                            @click="replies = !replies">
                                            <div class="text-xs flex justify-end text-gray-600 dark:text-zinc-300 w-16">
                                                {{ $replyCount }} {{ Str::plural('Reply', $replyCount) }}
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-gray-400 p-1 rounded-sm"
                                                :class="{ 'rotate-180': replies }"></i>
                                        </button>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- edit panel --}}
                {{-- @if (auth()->user()?->id === $comment->user_id || auth()->user()?->role === 'admin')
                    <div class="flex -top-4 items-start  relative" x-data="{ open: true }"
                        x-on:click.away="open = false">
                        <div class="border hidden border-gray-300 dark:border-zinc-700 flex-col justify-center space-y-1 py-2 rounded 
                        mt-4 mr-1"
                            :class="{ 'flex': open, 'hidden': !open }" x-show="open">
                            @if (auth()->user()->role !== 'admin' || auth()->user()?->id === $comment->user_id)
                                <form action="/post/{{ $post->slug }}/comment/{{ $comment->id }}/edit" method="get"
                                    class="w-full">
                                    <button
                                        class="p-2 hover:bg-blue-50 hover:text-blue-500 
                                        dark:hover:text-darkTextHover-600 
                                        dark:hover:bg-darkBlack w-full">Edit</button>
                                </form>
                            @endif
                            <div class="">
                                <form id="form-delete" action="/post/comment/{{ $comment->id }}/delete" method="post"
                                    class="">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button x-data=""
                                        x-on:click="$dispatch('open-modal','confirm-delete')" label="Delete"
                                        class="h-full w-full inline dark:hover:bg-darkBlack p-2" />
                                </form>
                                <x-modal-delete message="You sure want to delete this comment?" />
                            </div>
                        </div>
                        <div
                            class="relative flex rounded text-gray-400  hover:bg-gray-100 dark:hover:bg-darkBlack hover:text-gray-500">
                            <button class=" py-1 px-2 text-xl !leading-none" @click="open = true">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>
                @endif --}}
                <x-form.edit-btn editRoute="/post/{{ $post->slug }}/comment/{{ $comment->id }}/edit"
                    deleteRoute="/post/comment/{{ $comment->id }}/delete" :comment="$comment" />
            </div>
        </article>
    </x-panel>

    {{-- replies --}}
    <div class="ml-4 pt-4 dark:border-zinc-700" :class="{ 'border-l-2': (replies || reply) }">
        {{-- reply form --}}
        {{-- replies --}}
        <x-reply-form :post="$post" :comment="$comment" />
        <section class="space-y-4" x-show="replies">
            @if ($comment->replies)
                @foreach ($comment->replies as $reply)
                    @unless (isset($onEditPage) && auth()->user()->id == $reply->commentator->id)
                        <x-panel class="rounded-l-none">
                            <article class="relative">
                                <div class="flex  justify-between">
                                    <div class="flex space-x-2">
                                        <div class="flex-shrink-0 ">

                                            <x-user-avatar xs :user="$reply->commentator" />
                                        </div>
                                        <div class="space-y-4 w-full">
                                            <header>
                                                <h3 class="font-bold">
                                                    {{ ucwords($reply->commentator->name) }}
                                                </h3>
                                                <p class="text-xs">Posted
                                                    <time>{{ $reply->created_at->format('F j, Y, g:i a') }}</time>
                                                </p>
                                            </header>

                                            <p>
                                                {{ $reply->body }}
                                            </p>

                                        </div>
                                    </div>
                                    {{-- edit panel --}}

                                    {{-- @if (auth()->user()?->id === $reply->user_id || auth()->user()?->role === 'admin')
                                        <div class="flex -top-4 items-start  relative borderTest" x-data="{ open: false }"
                                            x-on:click.away="open = false">
                                            <div class="border flex border-gray-300 dark:border-gray-700 flex-col justify-center py-2 rounded mt-4 "
                                                x-show="open">

                                                <form
                                                    action="/post/{{ $post->slug }}/comment/{{ $comment->id }}}/reply/{{ $reply->id }}/edit"
                                                    method="get" class="w-full">
                                                    <button
                                                        class="p-2 hover:bg-blue-50 hover:text-blue-500 w-full">Edit</button>
                                                </form>


                                                <div class="p-2">
                                                    <form id="form-delete"
                                                        action="/post/comment/reply/{{ $reply->id }}/delete"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-danger-button x-data=""
                                                            x-on:click="$dispatch('open-modal','confirm-delete')"
                                                            label="Delete" />
                                                    </form>
                                                    <x-modal-delete message="You sure want to delete this comment?" />
                                                </div>
                                            </div>
                                            <div
                                                class="relative flex rounded text-gray-400  hover:bg-gray-100 dark:hover:bg-darkBlack hover:text-gray-500">
                                                <button class=" py-1 px-2 text-xl !leading-none" @click="open = true">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endunless --}}
                                    <x-form.edit-btn
                                        editRoute="/post/{{ $post->slug }}/comment/{{ $comment->id }}}/reply/{{ $reply->id }}/edit"
                                        deleteRoute="/post/comment/reply/{{ $reply->id }}/delete" :reply="$reply" />
                                </div>
                            </article>
                        </x-panel>
                    @endunless
                @endforeach

            @endif

        </section>
    </div>
</div>
