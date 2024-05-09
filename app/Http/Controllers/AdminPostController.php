<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use PhpParser\Node\Scalar\String_;

class AdminPostController extends Controller
{
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->simplePaginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.posts.create', [
            'posts' => Post::all()->sortByDesc('created_at')
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        //validate
        $attributes = request()->validate([
            'title' => ['required', 'max:255', 'unique:posts'],
            'slug' => ['required', 'unique:posts'],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['required', 'image'],
            'thumbnail_alt_txt' => ['required', 'max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['required', 'exists:subcategories,id'],
            'is_featured' => ['nullable'],
            'is_hot' =>  ['nullable'],
            'meta_title' => ['required', 'max:255'],
            'meta_description' => ['required', 'max:255'],
            'og_thumbnail' => ['nullable', 'image'],
            'og_title' => ['nullable', 'max:255'],

        ]);

        //associate user_id and store file
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        if (isset($attributes['og_thumbnail'])) {
            $attributes['og_thumbnail'] = request()->file('og_thumbnail')->store('thumbnails');
        }

        //store
        Post::create($attributes);

        //redirect
        return redirect('/admin/posts')->with('success', 'Post created!');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }


    public function update(Request $request, Post $post)
    {

        //validate
        $attributes = request()->validate([
            'title' => ['required', 'max:255',  Rule::unique('posts', 'title')->ignore($post->id)],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['image'],
            'thumbnail_alt_txt' => ['max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['required', 'exists:subcategories,id'],
            'is_featured' => ['nullable'],
            'is_hot' =>  ['nullable'],
            'meta_title' => ['required', 'max:255'],
            'meta_description' => ['required', 'max:255'],
            'og_thumbnail' => ['nullable', 'image'],
            'og_title' => ['nullable', 'max:255'],

        ]);

        /**
         * checkboxes when turned off, they are not included in the request payload, hence we manually set a default value if not turned on.
         * Make sure the value is always either 'on' or 'off' for integrity.
         */
        $attributes['is_featured'] = $request->has('is_featured') ? 'on' : 'off';
        $attributes['is_hot'] = $request->has('is_hot') ? 'on' : 'off';

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        if (isset($attributes['og_thumbnail'])) {
            $attributes['og_thumbnail'] = request()->file('og_thumbnail')->store('thumbnails');
        }

        //store
        $post->update($attributes);

        //redirect
        return redirect('/admin/posts')->with('success', 'Post Updated!');
    }


    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Post deleted!');
    }
}
