<x-dashboard.dashboard-layout>
    <x-slot:heading>All Posts</x-slot:heading>

    <section>

        @foreach($posts as $post)
            <x-dashboard.posts-table :post="$post" />
        @endforeach
    </section>

    {{$posts->links()}}
</x-dashboard.dashboard-layout>
