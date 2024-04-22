<x-app-layout>
    <h1 class="font-semibold">Category:
        <span>{{$category->name}}</span>
    </h1>


    @foreach($category->posts as $post)
        <h1>{{ $category->name }}</h1>
        <div class="border-2">

            <h1>{{$post->slug}}</h1>
           <p>{{$post->author->name}}</p>
        </div>
    @endforeach
</x-app-layout>
