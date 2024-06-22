@props(['comment', 'post', 'btn-label', 'editable'])
@auth
    <x-panel>
        <form action="/post/{{ $post->slug }}/comments/{{ isset($editable) ? $comment->id : '' }}" method="post">
            @csrf
            @if (isset($editable))
                @method('PATCH')
            @endif
            <header class="flex items-center">
                {{-- <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="user avatar" class="rounded-full"
                    width="40" height="40"> --}}
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

            <div class="flex justify-end">
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
    <p>
        <a href="/register" class="text-blue-500 hover:text-blue-600">Register</a> or
        <a href="/login" class="text-blue-500 hover:text-blue-600"">Login</a> to add comments.
    </p>
@endauth
