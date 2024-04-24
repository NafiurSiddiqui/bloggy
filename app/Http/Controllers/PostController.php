<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $featuredPosts = Post::where('is_featured', 1)->latest()->take(2)->get();
        $hot = Post::where('is_hot', 1)->latest()->take(2)->get();
        $posts =  Post::with('author','category','subcategory')->latest()->get();
        return view('index', [
            'posts' => $posts->isEmpty()? null : $posts,
            'post_count' => Post::count(),
            'featured' =>  $featuredPosts->isEmpty() ? null : $featuredPosts,
            'hot' =>  $hot->isEmpty() ? null : $hot,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //AUTH
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //validate
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'description' => 'required',
            'body' => 'required',
            'thumbnail' => ['required', 'image'],
            'thumbnail_alt_txt' => 'required',
            'category_id'=>['required', Rule::exists('categories', 'id')],
            'subcategory_id'=>['required', Rule::exists('subcategories', 'id')],

        ]);
//        $path = $request->file('thumbnail')->store('thumbnail');
//        return 'Successful!'. $path;
        if($request->file('thumbnail')->isValid()){
            return request()->file('thumbnail')->extension();
        }
        //store

        //redirect

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
