 @props(['for-name', 'for-id', 'for-title'])

 <select name="{{ $forName }}" id="{{ $forId }}" class="rounded-md w-32   dark:bg-gray-800 dark:text-gray-200"
     title="{{ $forTitle }}">

     {{ $slot }}
 </select>
