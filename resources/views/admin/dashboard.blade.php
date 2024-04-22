<x-app-layout>

    <x-slot:title>
        Dashboard
    </x-slot:title>

{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}


{{--    <div class="">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="borderTest h-screen grid grid-cols-2">--}}
{{--        <aside class="borderTest">--}}
{{--            <ul>--}}
{{--                <li>Dashboard</li>--}}
{{--            </ul>--}}
{{--        </aside>--}}
{{--        <section>--}}
{{--            Dashboard content--}}
{{--        </section>--}}
{{--    </div>--}}

    <div class="flex min-h-screen ">
        <aside class="flex flex-col w-64 bg-gray-800 dark:bg-gray-900 text-white px-4 py-6">

            <ul class="space-y-2">
                <li>
                    <a href="#" class="hover:text-gray-400 focus:outline-none focus:text-gray-300 p-2">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="hover:text-gray-400 focus:outline-none focus:text-gray-300 p-2">Settings</a>
                </li>
            </ul>
        </aside>
        <section class="flex-grow p-4">
            <h1>Welcome to your Dashboard!</h1>
            <p>This is where you'll see all your important data and controls.</p>
        </section>
    </div>


</x-app-layout>
