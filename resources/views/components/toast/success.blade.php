 @if (session('success'))
     <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
         class="bg-green-500 text-white fixed right-3 bottom-3 p-4 rounded">
         <p>{{ session('success') }}</p>
     </div>
 @endif
