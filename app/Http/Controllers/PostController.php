<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

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
        // dd($post->id, $nextPost);
        $recentPosts =
            $posts =  Post::where('is_published', 1)
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::orderBy('title', 'asc')->get();


        return view('posts.show', compact('post', 'nextPost', 'previousPost', 'recentPosts', 'categories'));
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
