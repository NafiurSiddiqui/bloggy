@props(['post', 'no-href'])

{{-- @dd($noHref) --}}
<footer {{ $attributes->merge([
    'class' => 'flex justify-between items-center mt-6',
]) }}>
    <div class="flex items-center text-sm">
        <x-user-avatar sm :user="$post->author" />
        <div class="ml-3">
            <h5 class="font-bold text-zinc-700">
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

            <div class="mt-1 block text-zinc-600 text-xs">
                <time>{{ $post->created_at->diffForHumans() }}</time>
            </div>
        </div>
    </div>
</footer>
