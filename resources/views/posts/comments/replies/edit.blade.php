 <x-post-content :post="$post" :comment="$comment" :reply="$reply" editPage>
     <x-slot:postComment>
         @foreach ($post->comments as $originalComment)
             <x-post-comment :comment="$originalComment" :post="$post" on-edit-page />
         @endforeach
     </x-slot:postComment>
 </x-post-content>
