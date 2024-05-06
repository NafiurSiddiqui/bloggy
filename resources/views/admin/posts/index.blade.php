<x-dashboard.dashboard-layout>
    <x-slot:heading>All Posts</x-slot:heading>

    <section class="mt-4 mb-8">

        @foreach($posts as $post)
            <x-dashboard.posts-table :post="$post" />
        @endforeach
    </section>

    <x-pagination-holder :item="$posts" />
</x-dashboard.dashboard-layout>
