@props(['post', 'no-href'])


<footer {{ $attributes->merge([
    'class' => 'flex justify-between items-center mt-6',
]) }}>
    <div class="flex items-center text-sm">
        <x-user-avatar sm :user="$post->author" />
        <div class="ml-3">
            <h5 class="font-bold text-zinc-700 dark:text-darkTextHeader-100">
                @if (isset($noHref) && $noHref)
                    <div>
                        {{ $post->author->name }}
                    </div>
                @else
                    <a
                        href="{{ route('author.show.posts', [
                            'author' => $post->author->name,
                        ]) }}">
                        {{ $post->author->name }}
                    </a>
                @endif
            </h5>

            <div class="mt-1 block text-zinc-600 dark:text-darkTextHeader-300 text-xs">
                <time>{{ \Carbon\Carbon::parse($post->created_at)->format('M D,Y') }}</time>
            </div>
        </div>
    </div>
</footer>
