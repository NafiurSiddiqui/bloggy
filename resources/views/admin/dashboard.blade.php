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
        <aside class="flex flex-col w-64 bg-gray-800 dark:bg-gray-900 text-white px-4 py-6">
            <ul class="space-y-2">
                <x-dashboard.nav-link route="dashboard">
                    Dashboard
                </x-dashboard.nav-link>
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
