<x-post-content :post="$post" :previousPost="$previousPost" :nextPost="$nextPost" :recentPosts="$recentPosts">
    <x-slot:postComment>
        @foreach ($post->comments as $comment)
            <x-post-comment :comment="$comment" :post="$post" />
        @endforeach
    </x-slot:postComment>

</x-post-content>
