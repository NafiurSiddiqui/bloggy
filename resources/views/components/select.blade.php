 @props(['for-name', 'for-id', 'for-title'])

 <select name="{{ $forName }}" id="{{ $forId }}"
     class="rounded-md w-32 border-2 border-gray-300 text-gray-500  dark:bg-gray-800 dark:text-gray-200 cursor-pointer"
     title="{{ $forTitle }}" {{ $attributes }}>

     {{ $slot }}
 </select>
