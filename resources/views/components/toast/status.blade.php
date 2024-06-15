 @if (session('status'))
     <div x-data="{ show: true }" x-show="show"
         class="bg-orange-100 dark:text-green-400 font-medium mb-4 p-4 rounded text-orange-800 text-sm">
         <p class="text-center">{{ session('status') }}</p>
     </div>
 @endif
