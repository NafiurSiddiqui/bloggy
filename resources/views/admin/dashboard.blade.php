<x-app-layout>

    <x-slot:title>
        Dashboard
    </x-slot:title>

    {{--    <x-slot name="header">--}}
    {{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
    {{--            {{ __('Dashboard') }}--}}
    {{--        </h2>--}}
    {{--    </x-slot>--}}

    <div class="flex min-h-screen ">
        <aside class="flex flex-col w-64 bg-gray-200 dark:bg-gray-900 text-white px-4 py-6">
            <ul class="space-y-2">
                <x-dashboard.nav-link route="admin" :active="request()->is('admin')">
                    Dashboard
                </x-dashboard.nav-link>

                <x-dashboard.nav-link route="admin/create" :active="request()->is('admin/create')">
                    Create post
                </x-dashboard.nav-link>

            </ul>
        </aside>
        <section class="flex-grow p-4">

        </section>
    </div>


</x-app-layout>
