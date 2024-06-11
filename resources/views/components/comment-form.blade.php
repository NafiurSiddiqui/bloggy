@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60/u={{ auth()->id() }}" alt="" class="rounded-full" width="40"
                    height="40">
                <h3 class="font-bold text-lg ml-3">Add a comment</h3>
            </header>

            <x-form.textarea />

            <div class="flex justify-end">

                <x-form.button>
                    Post
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
