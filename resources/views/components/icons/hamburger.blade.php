 <div class="flex items-center lg:hidden ml-1">
     <button @click="open = ! open" type="button"
         class="inline-flex items-center justify-center p-2 text-zinc-400 dark:text-zinc-500 hover:text-zinc-500 dark:hover:text-emerald-100/60 hover:bg-lightWhite dark:hover:bg-darkBlack focus:outline-none focus:bg-zinc-100 dark:focus:bg-darkBlack focus:text-zinc-500 dark:focus:text-zinc-400 transition duration-150 ease-in-out">
         <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
             <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
             <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
         </svg>
     </button>
 </div>
