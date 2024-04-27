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
        <aside class="hidden lg:flex flex-col w-64 bg-gray-200 dark:bg-gray-900 text-white px-4 py-6">
            <ul class="space-y-2">
                <x-dashboard.nav-link route="/admin" :active="request()->is('admin')">
                    Dashboard
                </x-dashboard.nav-link>

                <x-dashboard.nav-link route="/admin/post/create" :active="request()->is('admin/post/create')">
                    Create post
                </x-dashboard.nav-link>

                <x-dashboard.nav-link route="/admin/categories" :active="request()->is('admin/categories')">
                    Categories
                </x-dashboard.nav-link>
            </ul>
        </aside>
        <section class="flex-grow p-4 relative">
            <h1 class="font-semibold text-xl text-gray-500">{{$heading ?? 'Default heading'}}</h1>

            {{ $slot }}
        </section>
    </div>


</x-app-layout>
