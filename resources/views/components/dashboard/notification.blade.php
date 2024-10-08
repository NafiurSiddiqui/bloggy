<x-dropdown align="right" width="100">
    <x-slot:trigger>
        <div class="h-16 flex items-center" ">
            <button type="button"
                class="flex relative items-center  bg-transparent dark:bg-darkPostCard 
                border dark:border-zinc-800 dark:hover:border-darkBlack
                dark:hover:bg-darkBlack group hover:bg-lightWhite p-2  rounded-full cursor-pointer mr-2 lg:mr-0"
               >
     
                {{-- ping --}}
                                                            @if (
                                                                (isset($commentaryNotifications) &&
                                                                    $commentaryNotifications->isNotEmpty() &&
                                                                    (isset($pendingRegistration) && $pendingRegistration->isNotEmpty())) ||
                                                                    ($commentaryNotifications->isNotEmpty() || $pendingRegistration->isNotEmpty()))
            {{-- <div x-show="ping"> --}}
            <div>
                <span class="sr-only">Notifications</span>
                <div class="absolute -top-[0.1rem] -start-[0.1rem] ">
                    <span class="relative flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                    </span>
                </div>
            </div>
            @endif
            {{-- icon --}}
            <i
                class="fa-solid fa-bell text-zinc-300 dark:text-zinc-600 group-hover:text-zinc-400 dark:group-hover:text-emerald-100/60 "></i>

            </button>
        </div>
    </x-slot:trigger>


    <x-slot:content>
        <ul>
            @if ($pendingRegistration->isNotEmpty())
                <x-dashboard.notification-card :registration="$pendingRegistration" />
            @endif


            @if (count($commentaryNotifications) > 0)
                @foreach ($commentaryNotifications as $commentaryNotification)
                    <x-dashboard.notification-card :commentary="$commentaryNotification" />
                @endforeach
            @endif
        </ul>

    </x-slot:content>
</x-dropdown>
