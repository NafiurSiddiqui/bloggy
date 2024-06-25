{{-- <div class="relative">
    <div class="relative flex items-center  bg-gray-100 group hover:bg-gray-200 p-2  rounded-full cursor-pointer">

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

        <i class="fa-solid fa-bell text-gray-400 group-hover:text-gray-500 "></i>

    </div>
    <section class="z-20 bg-gray-50 leading-3  rounded  p-2 absolute -left-32 mt-8">

        <article
            class="flex text-sm border text-gray-700 bg-slate-100 border-gray-100 items-center p-1 w-[14rem] hover:bg-gray-50">
            <a href="{{ url('/admin') }}" role="link">
                You have a new comment by VISITOR
            </a>
            <span class="w-2 h-2 flex-shrink-0 bg-blue-500 inline-block rounded-full" role="presentation"></span>
        </article>
        <article class="text-sm border p-1 w-[12rem]">
            <a href="#">
                You have a new reply by VISITOR
            </a>
        </article>
        <article class="text-sm border p-1 w-[12rem]">
            <a href="#">
                You have a new application pending approval
            </a>
        </article>
    </section>
</div> --}}


<x-dropdown align="right" width="100">
    <x-slot:trigger>
        <div class="h-16 flex items-center" x-data="{ ping: true }">
            <button type="button"
                class="flex relative items-center  bg-gray-100 group hover:bg-gray-200 p-2  rounded-full cursor-pointer"
                @click="ping = false">
                {{-- ping --}}
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


            @if (count($newComments) > 0)
                @foreach ($newComments as $newComment)
                    {{-- @dd($newComment) --}}
                    {{-- Don't show notification for the current user only comments --}}
                    {{-- @unless ($newComment[0]['user_id'] === auth()->user()->id && count($newComment) === 1)
                    <x-dashboard.notification-card :comment="$newComment" />
                @endunless --}}
                    <x-dashboard.notification-card :comment="$newComment" />
                @endforeach
            @endif
        </ul>

    </x-slot:content>
</x-dropdown>
