   @props(['comment', 'post', 'reply', 'btn-label', 'editable'])

   @auth
       <x-panel class="rounded-l-none" x-show="reply">
           <form
               action="/post/{{ $post->slug }}/comments/{{ $comment->id }}/reply/{{ isset($editable) ? "$reply->id/edit" : '' }}"
               method="post">
               @csrf
               @if (isset($editable))
                   @method('PATCH')
               @endif
               <header class="flex items-center">
                   <img src="https://i.pravatar.cc/60/u={{ auth()->id() }}" alt="" class="rounded-full" width="40"
                       height="40">
                   <h3 class="font-bold text-lg ml-3">Reply to this thread</h3>
               </header>

               @if (isset($reply))
                   <x-form.textarea name="body" required sr-only>
                       {{ $reply->body }}
                   </x-form.textarea>
               @else
                   <x-form.textarea name="body" required sr-only />
               @endif

               <div class="flex justify-end">
                   <x-form.button>
                       {{ isset($editable) ? 'Update' : 'Post' }}
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
