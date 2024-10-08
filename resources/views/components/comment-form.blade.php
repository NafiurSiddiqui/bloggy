@props(['comment', 'post', 'btn-label', 'editable'])
{{-- @dd($editable) --}}
@auth
    <x-panel class="">
        <form action="/post/{{ $post->slug }}/comments/{{ isset($editable) ? $comment?->id : '' }}" method="post">
            @csrf
            @if (isset($editable) && $editable)
                @method('PATCH')
            @endif
            <header class="flex items-center">
                <x-user-avatar xs :user="auth()->user()" />
                <h3 class="font-bold text-lightText-600 dark:text-zinc-300 text-lg ml-3">

                    {{ isset($editable) && $editable ? 'Edit Your' : 'Add a' }} comment
                </h3>
            </header>

            @if (isset($comment))
                <x-form.textarea name="body" required sr-only>
                    {{ $comment->body }}
                </x-form.textarea>
            @else
                <x-form.textarea name="body" required sr-only />
            @endif

            <div class="flex justify-between items-center mt-6">

                @if (isset($editable) && $editable)
                    <x-secondary-button class="!py-3  mr-3" link href="{{ url()->previous() }}">
                        Cancel
                    </x-secondary-button>
                @endif


                <div class="w-full flex justify-end">
                    <x-form.sci-fi-btn submit label="{{ $btnLabel }}" />
                </div>

            </div>
        </form>
    </x-panel>
@else
    <p class="text-lightText-700 dark:text-lightText-300">
        <x-text-link href="/register" class="!text-lg text-lightText-700" highlight>
            Register
        </x-text-link>
        or
        <x-text-link href="/login" class="!text-lg text-lightText-700" highlight>Login</x-text-link> to add comments.
    </p>
@endauth
