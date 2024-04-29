<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex justify-between w-full">
                <!-- Logo -->
                <div class="shrink-0 flex items-center font-bold text-2xl">
                        Bloggy
                </div>

{{--            TODO: Delete the development Admin btn below--}}
                @if(request()->routeIs('home') || request()->routeIs('home.*'))
                    <a class="border-2 px-4 py-1 content-center h-8 " href={{route('admin')}} >
                        Go to Admin
                    </a>
                @endif

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                @guest()
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('All Posts') }}
                    </x-nav-link>
                @endguest
                @auth

                        @if(request()->is('/'))
                            <x-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        @elseif(request()->routeIs('admin') || request()->routeIs('admin.*'))
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Client-side') }}
                            </x-nav-link>
                        @endif
                @endauth
                </div>
            </div>

            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(request()->routeIs('home'))
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('All Posts') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('category', ['category'=> 'test'])" :active="request()->routeIs('category.*')">
                {{ __('category') }}
            </x-responsive-nav-link>
            @endif
        </div>

            @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div>
                    <x-responsive-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.post.create')" :active="request()->routeIs('admin.post.create')">
                        {{ __('Create a Post') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.categories')" :active="request()->routeIs('admin.categories')">
                        {{ __('Categories') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.subcategories')" :active="request()->routeIs('admin.subcategories')">
                        {{ __('Sub-categories') }}
                    </x-responsive-nav-link>




{{--                        <x-dashboard.nav-link route="/admin/subcategories" :active="request()->is('admin/subcategories')">--}}
{{--                            Sub-categories--}}
{{--                        </x-dashboard.nav-link>--}}
                </div>
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    @if(request()->routeIs('home'))
                        <x-responsive-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    @elseif(request()->routeIs('admin') || request()->routeIs('admin.*'))

                        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Client-side') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    @endif
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
            @endauth
    </div>
</nav>
