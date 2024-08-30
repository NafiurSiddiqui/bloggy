<nav x-data="{ open: false }" class="dark:bg-darkNavFooter bg-lightNavFooter">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center justify-between w-full">
                <!-- Logo -->
                @if (request()->routeIs('home') || request()->routeIs('home.*'))
                    <x-icons.logo />
                @else
                    <a class="shrink-0 text-gray-700 flex items-center font-bold text-2xl hover:text-gray-600 "
                        href={{ route('home') }}>
                        <x-icons.logo />
                    </a>
                @endif

                <div>
                    <x-toggle-theme-btn />
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('posts.all')" :active="request()->routeIs('posts.all')">
                        {{ __('All Posts') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categories.all')" :active="request()->routeIs('categories')">
                        {{ __('Categories') }}
                    </x-nav-link>
                    @guest()
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    @endguest


                    @auth

                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                            @if (!request()->routeIs('admin'))
                                <x-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            @elseif(request()->routeIs('admin') || request()->routeIs('admin.*'))
                                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                    {{ __('Client-side') }}
                                </x-nav-link>
                            @endif
                        @endif
                    @endauth

                </div>

            </div>

            @auth
                <div class="flex items-center  sm:ms-6">
                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'author')
                        <x-dashboard.notification />
                    @endif

                    <!-- Settings Dropdown -->
                    <div class="hidden lg:flex sm:items-center ">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <x-user-avatar xs :user="Auth::user()" />
                                    <div class="ml-2">{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
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
                </div>
            @endauth
            <!-- Hamburger -->
            <x-icons.hamburger />
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1 ">
            {{-- @if (request()->routeIs('home') || request()->routeIs('profile.*')) --}}

            <x-responsive-nav-link :href="route('posts.all')" :active="request()->routeIs('posts.all')">
                {{ __('All Posts') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categories.all')" :active="request()->routeIs('category.*')">
                {{ __('Categories') }}
            </x-responsive-nav-link>
            {{-- @endif --}}

            @guest
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endguest
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 border-b border-b-gray-300 dark:border-gray-600">
                <div>
                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <div>
                            <x-responsive-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                                {{ __('Dashboard') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('admin.post.create')" :active="request()->routeIs('admin.post.create')">
                                {{ __('Create a Post') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('admin.posts')" :active="request()->is('admin.posts')">
                                {{ __('All Posts') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('admin.categories')" :active="request()->routeIs('admin.categories')">
                                {{ __('Categories') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('admin.subcategories')" :active="request()->routeIs('admin.subcategories')">
                                {{ __('Sub-categories') }}
                            </x-responsive-nav-link>

                            @if (request()->routeIs('home'))
                                {{-- <x-responsive-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                                {{ __('Dashboard') }}
                            </x-responsive-nav-link> --}}
                            @elseif(request()->routeIs('admin') || request()->routeIs('admin.*') || request()->routeIs('profile.*'))
                                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                    {{ __('Client-side') }}
                                </x-responsive-nav-link>
                            @endif
                        </div>
                    @endif

                    <div class="">
                        <a href="{{ route('profile.edit') }}"
                            class="w-full p-4 border-l-4 border-transparent flex hover:bg-gray-50 hover:border-gray-300 group hover:text-gray-600 ">
                            <x-user-avatar xs :user="Auth::user()" />
                            <div class="ml-2">
                                <div
                                    class="font-medium text-base text-gray-800 dark:text-gray-200 group-hover:text-gray-900">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500 group-hover:text-gray-600">
                                    {{ Auth::user()->email }}</div>
                            </div>
                        </a>
                    </div>

                    <div class="mt-3 space-y-1">


                        @auth
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>
                        @endauth
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
