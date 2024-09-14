<x-post-content :post="$post" :previousPost="$previousPost" :nextPost="$nextPost" :recentPosts="$recentPosts" :categories="$categories">
    <x-slot:postComment>
        @foreach ($post->comments as $comment)
            <x-post-comment :comment="$comment" :post="$post" />
        @endforeach
    </x-slot:postComment>

</x-post-content>
