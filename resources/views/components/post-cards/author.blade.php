@props(['post', 'no-href', 'featured' => false])


<footer {{ $attributes->merge([
    'class' => 'flex justify-between items-center',
]) }}>
    <div class="flex items-center text-sm">
        <x-user-avatar sm :user="$post->author" featured="{{ $featured }}" />
        <div class="ml-3">
            <h5
                class="font-bold text-lightText-700
             hover:underline hover:text-emerald-500 hoverTextEffect dark:text-darkText-100 dark:hover:text-darkTextHover-600">
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

            <div class="mt-1 block text-zinc-600 dark:text-darkText-300 text-xs">
                <time>{{ \Carbon\Carbon::parse($post->created_at)->format('M D,Y') }}</time>
            </div>
        </div>
    </div>
</footer>
