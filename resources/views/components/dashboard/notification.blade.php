<x-dropdown align="right" width="100">
    <x-slot:trigger>
        <div class="h-16 flex items-center" ">
            <button type="button"
                class="flex relative items-center  bg-gray-100 group hover:bg-gray-200 p-2  rounded-full cursor-pointer"
               >
                {{-- ping --}}
                  @if (
                      (isset($commentaryNotifications) &&
                          $commentaryNotifications->isNotEmpty() &&
                          (isset($pendingRegistration) && $pendingRegistration->isNotEmpty())) ||
                          ($commentaryNotifications->isNotEmpty() || $pendingRegistration->isNotEmpty()))
            <div x-show="ping">
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
            <i class="fa-solid fa-bell text-gray-400 group-hover:text-gray-500 "></i>

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
