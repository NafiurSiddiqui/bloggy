 @props(['for-name', 'for-id', 'for-title'])

 <select name="{{ $forName }}" id="{{ $forId }}"
     class="rounded-sm w-32 border-2 border-gray-300 text-gray-500 dark:border-zinc-700  dark:bg-zinc-800 dark:text-gray-200 cursor-pointer dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
     title="{{ $forTitle }}" {{ $attributes }}>

     {{ $slot }}
 </select>
