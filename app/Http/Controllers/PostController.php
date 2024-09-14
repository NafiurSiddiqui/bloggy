<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::latest()->simplePaginate(20);
        return view('posts.all', compact('posts'));
    }

    public function home(): View
    {


        $featuredPosts = Post::where('is_featured', 'on')->where('is_published', 1)
            ->latest()
            ->get();

        $hot = Post::where('is_hot', 'on')->where('is_published', 1)
            ->latest()
            ->get();
        $posts =  Post::where('is_published', 1)
            ->latest()
            ->get();

        return view('index', [
            'posts' => $posts->isEmpty() ? null : $posts,
            'post_count' => Post::count(),
            'featured_posts' =>  $featuredPosts->isEmpty() ? null : $featuredPosts,
            'hot' =>  $hot->isEmpty() ? null : $hot,

        ]);
    }

    public function show(Post $post): View
    {
        // get the immediate next post
        $nextPost = Post::where('id', '>', $post->id)->where('is_published', 1)->first();
        // get the immediate previous post
        $previousPost = Post::where('id', '<', $post->id)->where('is_published', 1)->get()->last();
        // dd($post->id, $previousPost);
        $recentPosts =
            $posts =  Post::where('is_published', 1)
            ->whereNot('id', $post->id)
            ->latest()
            ->take(8)
            ->get();

        if ($post->is_featured === "on") {
            $nextPost = Post::where('id', '>', $post->id)
                ->where('is_published', 1)
                ->where('is_featured', "on")
                ->first();

            $previousPost = Post::where('id', '<', $post->id)
                ->where('is_published', 1)
                ->where('is_featured', "on")
                ->get()->last();
        }

        if ($post->is_hot === "on") {
            $nextPost = Post::where('id', '>', $post->id)
                ->where('is_published', 1)
                ->where('is_hot', "on")
                ->first();

            $previousPost = Post::where('id', '<', $post->id)
                ->where('is_published', 1)
                ->where('is_hot', "on")
                ->get()->last();
        }


        //Cateogries
        if (
            Str::contains(request()->session()->previousUrl(), 'categories')
            || (request()->has('category') && (session()->get('cameFromCategoriesURL') === true))
        ) {
            request()->session()->put('cameFromCategoriesURL', true);

            $nextPost =
                Post::where('id', '>', $post->id)
                ->where('is_published', 1)
                ->where('category_id', $post->category->id)
                ->first();

            $previousPost = Post::where('id', '<', $post->id)
                ->where('is_published', 1)
                ->where('category_id', $post->category->id)
                ->get()->last();
        } else {
            request()->session()->forget('cameFromCategoriesURL');
        }
        //Subcategories
        if (
            Str::contains(request()->session()->previousUrl(), 'category')
            || (request()->has('subcategory') && (session()->get('cameFromSubCategoriesURL') === true))
        ) {
            request()->session()->put('cameFromSubCategoriesURL', true);
            // dd($post->subcategory);
            $nextPost =
                Post::where('id', '>', $post->id)
                ->where('is_published', 1)
                ->where('subcategory_id', $post->subcategory->id)
                ->first();

            $previousPost = Post::where('id', '<', $post->id)
                ->where('is_published', 1)
                ->where('subcategory_id', $post->subcategory->id)
                ->get()->last();
        } else {
            request()->session()->forget('cameFromSubCategoriesURL');
        }

        $categories = Category::orderBy('title', 'asc')->get();
        $image = $post->getMedia('thumbnails');

        return view('posts.show', compact('post', 'nextPost', 'previousPost', 'recentPosts', 'categories', 'image'));
    }

    public function showFeaturedPosts(): View
    {
        $featuredPosts = Post::where('is_featured', 'on')
            ->where('is_published', 1)
            ->latest()
            ->simplePaginate(20);
        return view('posts.featured', compact('featuredPosts'));
    }

    public function showHotPosts(): View
    {
        $hotPosts = Post::where('is_hot', 'on')->latest()->simplePaginate(20);
        return view('posts.hot', compact('hotPosts'));
    }

    public function showPostsbyAuthor(User $author): View
    {


        $posts = $author->posts;

        return view('posts.author.index', compact('posts', 'author'));
    }
}
