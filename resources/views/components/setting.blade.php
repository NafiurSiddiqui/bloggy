@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">

    <h1 class="font-bold text-xl my-8">
        {{ $heading }}
    </h1>

    <div class="md:flex space-y-4 md:space-y-0 ">

        <aside class="w-48 md:flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
{{--                    <a href="/admin" class="{{ request()->is('admin') ? 'text-blue-500' : '' }}">All--}}
{{--                        Posts</a>--}}
                    navlink
                </li>
                <li>
{{--                    <a href="/admin/create"--}}
{{--                       class="{{ request()->is('admin/create') ? 'text-blue-500' : '' }}">Create New Post</a>--}}
                    navlink
                </li>
            </ul>
        </aside>


        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>

        </main>

    </div>


</section>
