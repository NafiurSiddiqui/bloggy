@props(['comment', 'post', 'btn-label', 'editable'])
@auth
    <x-panel>
        <form action="/post/{{ $post->slug }}/comments/{{ isset($editable) ? $comment->id : '' }}" method="post">
            @csrf
            @if (isset($editable))
                @method('PATCH')
            @endif
            <header class="flex items-center">

                <x-user-avatar xs :user="auth()->user()" />
                <h3 class="font-bold text-lg ml-3">{{ isset($editable) ? 'Edit Your' : 'Add a' }} comment</h3>
            </header>

            @if (isset($comment))
                <x-form.textarea name="body" required sr-only>
                    {{ $comment->body }}
                </x-form.textarea>
            @else
                <x-form.textarea name="body" required sr-only />
            @endif

            <div class="flex justify-end items-end">
                @if (isset($editable))
                    <x-secondary-button class="!py-3  mr-3" link href="{{ url()->previous() }}">
                        Cancel
                    </x-secondary-button>
                @endif
                <x-form.button>
                    {{ $btnLabel }}
                </x-form.button>
            </div>
        </form>
        @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </x-panel>
@else
    <p class="text-zinc-400">
        <a href="/register" class="dark-link-text-color dark-link-text-color-hover">Register</a> or
        <a href="/login" class="dark-link-text-color dark-link-text-color-hover"">Login</a> to add comments.
    </p>
@endauth
