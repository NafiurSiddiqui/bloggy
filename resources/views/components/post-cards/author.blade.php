@props(['post'])
<footer {{ $attributes->merge([
    'class' => 'flex justify-between items-center mt-8',
]) }}>
    <div class="flex items-center text-sm">
        <x-user-avatar sm :user="$post->author" />
        <div class="ml-3">
            <h5 class="font-bold text-zinc-300">
                <a href="/?author={{ $post->author->name }}">
                    {{ $post->author->name }}
                </a>
            </h5>

            <div class="mt-1 block text-zinc-300 text-xs">
                <time>{{ $post->created_at->diffForHumans() }}</time>
            </div>
        </div>
    </div>
</footer>
