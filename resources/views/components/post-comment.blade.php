@props(['comment'])

<x-panel>
    <article class="flex space-x-2">
        <div class="flex-shrink-0">
            {{--            <img src="https://i.pravatar.cc/60/u={{ $comment->user_id }}" alt="" class="rounded-full" width="60" --}}
            {{--                 height="60"> --}}
            <img src="https://i.pravatar.cc/60/u=123123h15135" alt="" class="rounded-full" width="60"
                height="60">
        </div>
        <div class="space-y-4">
            <header>
                <h3 class="font-bold">
                    {{--                    {{ $comment->author->username }} --}}
                    Some Name
                </h3>
                <p class="text-xs">Posted
                    {{--                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time> --}} 8 hours ago
                </p>
            </header>

            <p>
                {{--                {{ $comment->body }} --}}
                comments
            </p>
        </div>
    </article>
</x-panel>
