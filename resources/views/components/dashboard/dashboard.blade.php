<div>
    <x-slot:heading>Dashboard</x-slot:heading>
    {{-- Here you need to notify if there is any application pending --}}
    {{-- render table of applications with approve or reject actions --}}
    <div class="my-4 leading-6 border p-2 rounded-xl">
        {{-- @dd($pending_registrations_count) --}}
        <h2 class="font-bold text-gray-500 text-lg">Notifications</h2>

        @if (isset($pending_registrations_count) && $pending_registrations_count > 0)
            <p class="mb-4">
                You have <span class="font-semibold">{{ $pending_registrations_count }}</span> new appliations
                awaiting your decision.
            </p>


            <div x-data="{ show: false }">
                <h3 id="accordion-collapse-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-gray-200 rounded-md focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
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
                                class="p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900 flex flex-wrap items-center justify-between overflow-auto">
                                <div class="w-3/5 md:w-1/2 ">
                                    <p class="text-gray-700 break-words"><span
                                            class="font-semibold text-gray-600">Email:</span>
                                        {{ $application->email }}</p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-gray-600">Submitted at:
                                        </span>
                                        {{ $application->created_at->diffForHumans() }}
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" name="submit_type" value="approve"
                                        class="text-green-600 hover:text-green-700 border border-green-400 hover:border-green-300 hover:bg-green-100 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-2 py-2 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Approve</button>
                                    <button type="submit" name="submit_type" value="reject"
                                        class="text-rose-600 hover:text-rose-700 border border-rose-300 hover:bg-rose-100 hover:border-rose-200 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-xs px-2 py-2 text-center me-2 mb-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:hover:bg-rose-600 dark:focus:ring-rose-900">Reject</button>
                                </div>
                            </article>
                        </form>
                    @endforeach

                </div>

            </div>
        @else
            <p class="text-gray-600 text-sm">No Notifications</p>
        @endif
    </div>

</div>
