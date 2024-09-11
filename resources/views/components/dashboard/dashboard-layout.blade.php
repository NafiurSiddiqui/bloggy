<x-app-layout>

    <x-slot:title>
        {{ __('Dashboard') }}
    </x-slot:title>


    <div class="flex min-h-screen w-full">
        <aside
            class="hidden lg:flex flex-col w-64 bg-lightWhite 
            dark:bg-darkBlack 
            dark:border-r dark:border-zinc-800 text-white px-4 pl-6">
            <ul class="space-y-2 bg-lightPage  dark:bg-darkPostCard ">
                <x-responsive-nav-link href="/admin" :active="request()->is('admin')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="/admin/post/create" :active="request()->is('admin/post/create')">
                    Create post
                </x-responsive-nav-link>

                <x-responsive-nav-link href="/admin/posts" :active="request()->is('admin/posts')">
                    All Posts
                </x-responsive-nav-link>



                <x-responsive-nav-link href="/admin/categories" :active="request()->is('admin/categories')">
                    Categories
                </x-responsive-nav-link>

                <x-responsive-nav-link href="/admin/subcategories" :active="request()->is('admin/subcategories')">
                    Sub-categories
                </x-responsive-nav-link>
            </ul>
        </aside>
        <section class="flex-grow p-4 relative w-full md:mr-6 dark:bg-darkPage">

            <x-h2>{{ $heading ?? 'Default heading' }}</x-h2>
            {{ $slot }}
        </section>
    </div>

    <x-toast.success />
</x-app-layout>
