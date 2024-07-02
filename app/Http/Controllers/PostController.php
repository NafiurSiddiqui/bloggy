<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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
        $featuredPosts = Post::where('is_featured', 'on')->where('is_published', 1)
            ->take(3)
            ->latest()
            ->get();
        $hot = Post::where('is_hot', 'on')->where('is_published', 1)
            ->latest()
            ->get();
        $posts =  Post::with('author', 'category', 'subcategory')->where('is_published', 1)->latest()->get();

        return view('index', [
            'posts' => $posts->isEmpty() ? null : $posts,
            'post_count' => Post::count(),
            'featured_posts' =>  $featuredPosts->isEmpty() ? null : $featuredPosts,
            'hot' =>  $hot->isEmpty() ? null : $hot,

        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
