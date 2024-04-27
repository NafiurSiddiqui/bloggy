<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('admin.create', [
            'category_is_empty' => Category::all()->isEmpty()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd(request()->all());
//        //AUTH
//        if(Auth::guest()){
//            return redirect()->route('login');
//        }


        //validate
        $attributes = request()->validate([
            'title' => ['required','max:255','unique:posts'],
            'slug' => ['required', 'unique:posts'],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['required', 'image'],
            'thumbnail_alt_txt' => ['required', 'max:100'],
//            'category_id'=>['nullable', 'exists:categories,id' ],
//            'subcategory_id'=>['nullable', 'exists:categories,id' ],
            'category_id'=>['required', 'exists:categories,id' ],
            'subcategory_id'=>['required', 'exists:categories,id' ],
//        'category_id'=>['required', Rule::exists('categories', 'id')],
//            'subcategory_id'=>['required', Rule::exists('subcategories', 'id')],
            'is_published'=> ['nullable', 'boolean'],
            'is_draft'=> ['nullable', 'boolean'],
            'is_featured'=> ['nullable', 'boolean'],
            'is_hot'=> ['nullable', 'boolean'],
            'meta_title'=>['required', 'max:255'],
            'meta_description'=>['required', 'max:255'],
            'og_thumbnail'=>['nullable', 'image'],
            'og_title'=>['nullable', 'max:255'],

        ]);
//        $path = $request->file('thumbnail')->store('thumbnail');
//        return 'Successful!'. $path;
//        if($request->file('thumbnail')->isValid()){
//            return request()->file('thumbnail')->extension();
//        }

        //associate user_id and store file
//        $attributes['user_id'] = Auth::id();
//        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        dd($attributes);
//        //store
//        Post::create($attributes);
//
//        //redirect
//        return redirect('/admin')->with('success', 'Post created!');
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
