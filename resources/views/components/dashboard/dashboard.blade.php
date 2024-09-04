<div>
    <x-slot:heading>Dashboard</x-slot:heading>
    {{-- Here you need to notify if there is any application pending --}}
    {{-- render table of applications with approve or reject actions --}}
    <div class="my-4 leading-6 border dark:border-zinc-700 px-2 py-4 rounded-sm ">

        <h2 class="font-bold text-zinc-500 text-lg dark:text-zinc-400">Notifications</h2>

        @if (isset($pending_registrations_count) && $pending_registrations_count > 0)
            <p class="mb-4 dark:text-zinc-300 ">
                You have <span class="font-semibold">{{ $pending_registrations_count }}</span> new applications
                awaiting your decision.
            </p>


            <div x-data="{ show: false }">
                <h3 id="accordion-collapse-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-zinc-500 border  border-zinc-200 rounded-sm focus:ring-4 focus:ring-zinc-200 dark:focus:ring-zinc-800 dark:border-zinc-700 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 gap-3"
                        aria-expanded="true" aria-controls="accordion-collapse-body-1" @click="show = !show">
                        <span> Show applications</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h3>
                <div id="accordion-collapse-body-1" :class="{ hidden: show }"
                    aria-labelledby="accordion-collapse-heading-1" {{-- class="hidden" --}}>
                    @foreach ($pending_registrations as $application)
                        <form action="/admin/registration/{{ $application->id }}" method="post">
                            @csrf
                            @method('PATCH')
                            <article
                                class="p-5 border  border-zinc-200 dark:border-zinc-700 dark:bg-darkPostCard
                                
                                flex flex-wrap items-center justify-between overflow-auto">
                                <div class="w-3/5 md:w-1/2 ">
                                    <p class="text-zinc-700 dark:text-zinc-300 break-words"><span
                                            class="font-semibold text-zinc-600 dark:text-zinc-400">Email:</span>
                                        {{ $application->email }}</p>
                                    <p class="text-zinc-700 dark:text-zinc-300">
                                        <span class="font-semibold text-zinc-600 dark:text-zinc-400">Submitted at:
                                        </span>
                                        {{ $application->created_at->diffForHumans() }}
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" name="submit_type" value="approve"
                                        class="text-emerald-600 hover:text-emerald-700 border border-emerald-400 hover:border-emerald-300 hover:bg-emerald-100 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-sm text-xs px-2 py-2 text-center me-2 mb-2 dark:border-emerald-500 dark:text-emerald-500 dark:hover:text-white dark:hover:bg-emerald-600 dark:focus:ring-emerald-800">Approve</button>
                                    <button type="submit" name="submit_type" value="reject"
                                        class="text-rose-600 hover:text-rose-700 border border-rose-300 hover:bg-rose-100 hover:border-rose-200 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-sm text-xs px-2 py-2 text-center me-2 mb-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:hover:bg-rose-600 dark:focus:ring-rose-900">Reject</button>
                                </div>
                            </article>
                        </form>
                    @endforeach

                </div>

            </div>
        @else
            <p class="text-zinc-600 text-sm">No Notifications</p>
        @endif
    </div>

</div>
