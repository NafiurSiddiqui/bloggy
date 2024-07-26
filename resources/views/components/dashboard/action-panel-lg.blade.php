 <aside class="fixed right-0 top-[25%] hidden lg:block ">
     <x-panel class="px-2 py-3  bg-stone-200 z-[10000] min-h-[20rem]">
         <h2 class="mb-3 font-semibold text-gray-500 border-b border-gray-300 ">Actions</h2>
         <div class="flex flex-col border-2 rounded p-4 bg-slate-300">
             {{ $slot }}
         </div>

         <div class="flex justify-between items-center mt-8">
             <x-secondary-button class="mt-4 w-full" link href="/admin/posts">
                 Cancel
             </x-secondary-button>
         </div>
     </x-panel>
 </aside>
