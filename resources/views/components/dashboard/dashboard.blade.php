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
                    aria-labelledby="accordion-collapse-heading-1">
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
                                        class="border border-emerald-200 dark:text-emerald-400 text-sm hover:text-emerald-600 ms-3 py-1 px-4  text-emerald-400 dark:border-emerald-300  rounded-sm dark:focus:bg-emerald-700 focus:ring-2 dark:focus:ring-emerald-400
                                    dark:hover:text-white dark:hover:bg-emerald-600 dark:hover:border-emerald-400
                                        text-center ">Approve</button>
                                    <x-danger-button submit name="submit_type" value="reject" label="Reject" sm
                                        noFormId />
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
