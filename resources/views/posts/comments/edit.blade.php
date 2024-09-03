 <x-post-content :post="$post" :comment="$comment" editPage>
     <x-slot:postComment>
         @foreach ($post->comments as $originalComment)
             @unless ($originalComment->id == $comment->id)
                 <x-post-comment :comment="$originalComment" :post="$post" />
             @endunless
         @endforeach
     </x-slot:postComment>
 </x-post-content>
