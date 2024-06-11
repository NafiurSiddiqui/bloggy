<x-app-layout>
    <x-slot:title>
        {{ __('Dashboard') }}
    </x-slot:title>


    <div class="flex min-h-screen ">
        <aside class="hidden lg:flex flex-col w-64 bg-gray-200 dark:bg-gray-900 text-white px-4 py-6">
            <ul class="space-y-2">
                <x-dashboard.nav-link route="/admin" :active="request()->is('admin')">
                    {{ __('Dashboard') }}
                </x-dashboard.nav-link>

                <x-dashboard.nav-link route="/admin/post/create" :active="request()->is('admin/post/create')">
                    Create post
                </x-dashboard.nav-link>

                <x-dashboard.nav-link route="/admin/posts" :active="request()->is('admin.posts')">
                    All Posts
                </x-dashboard.nav-link>



                <x-dashboard.nav-link route="/admin/categories" :active="request()->is('admin/categories')">
                    Categories
                </x-dashboard.nav-link>

                <x-dashboard.nav-link route="/admin/subcategories" :active="request()->is('admin/subcategories')">
                    Sub-categories
                </x-dashboard.nav-link>
            </ul>
        </aside>
        <section class="flex-grow p-4 relative w-full">
            <h1 class="font-semibold text-xl text-gray-500">{{ $heading ?? 'Default heading' }}</h1>
            {{ $slot }}
        </section>
    </div>

    <x-toast.success />
</x-app-layout>
