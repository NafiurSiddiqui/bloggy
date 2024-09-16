<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;



class AdminPostController extends Controller
{
    public function index(): View
    {

        $hasSort = request()->has('sort');


        $posts = Post::filter(request(['search', 'category_filter', 'status_filter', 'admin_filter']))
            ->sort(request(['sort', 'dir']))
            ->simplePaginate(10)
            ->withQueryString();

        return view('admin.posts.index', [

            'posts' => $posts,

        ]);
    }

    public function create(): View
    {

        return view('admin.posts.create');
    }

    public function store(): RedirectResponse
    {


        $categoryValidator = function (string $attribute, mixed $value, Closure $fail) {
            if (!is_numeric($value)) {
                // Allow "---" or any other non-numeric value
                return true;
            } else {
                // Validate numeric values for existence
                Validator::make(['category_id' => $value], ['category_id' => 'exists:categories,id']);
            }
        };
        $subcategoryValidator = function (string $attribute, mixed $value, Closure $fail) {
            if (!is_numeric($value)) {
                // Allow "---" or any other non-numeric value
                return true;
            } else {
                // Validate numeric values for existence
                Validator::make(['subcategory_id' => $value], ['subcategory_id' => 'exists:subcategory']);
            }
        };

        //validate
        $attributes = request()->validate([
            'title' => ['required', 'max:255', 'unique:posts'],
            'slug' => ['nullable', 'unique:posts'],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['required', 'image'],
            'thumbnail_alt_txt' => ['required', 'max:100'],
            'category_id' => ['nullable', $categoryValidator],
            'subcategory_id' => ['nullable', $subcategoryValidator],
            'is_featured' => ['nullable'],
            'is_published' => ['boolean'],
            'is_draft' => ['boolean'],
            'is_hot' =>  ['nullable'],
            'meta_title' => ['required', 'max:255'],
            'meta_description' => ['required', 'max:255'],
            'og_thumbnail' => ['nullable', 'image'],
            'og_title' => ['nullable', 'max:255'],

        ]);



        //check if a category by slug 'uncategorized' exist in database
        $uncategorizedCategory = Category::where('slug', 'uncategorized')->firstOrCreate([
            'title' => 'Uncategorized',
            'slug' => 'uncategorized'
        ]);

        $attributes['category_id'] = request()->input('category_id') === "---" ?   $uncategorizedCategory->id : request()->input('category_id');
        $attributes['subcategory_id'] = request()->input('subcategory_id') === "---" ? null : request()->input('subcategory_id');


        //associate user_id and store file
        $attributes['user_id'] = auth()->id();

        if (isset($attributes['og_thumbnail'])) {
            $attributes['og_thumbnail'] = request()->file('og_thumbnail')->store('thumbnails');
        }
        //auto generate title to slug
        $attributes['slug'] = request('slug') ? Str::slug(request('slug'), '-') : Str::slug($attributes['title'], '-');

        //store
        Post::create($attributes)
            ->addMediaFromRequest('thumbnail')
            ->withResponsiveImages()
            ->attributes(['alt' => request('thumbnail_alt_txt')])
            ->toMediaCollection('thumbnails');

        //redirect
        if (request()->has('is_draft')) {

            return redirect('/admin/posts')->with('notify', 'Post saved as draft!');
        } else {
            return redirect('/admin/posts')->with('success', 'Post published!');
        }
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }


    public function update(Post $post)
    {

        $categoryValidator = function (string $attribute, mixed $value, Closure $fail) {
            if (!is_numeric($value)) {
                // Allow "---" or any other non-numeric value
                return true;
            } else {
                // Validate numeric values for existence
                Validator::make(['category_id' => $value], ['category_id' => 'exists:categories,id']);
            }
        };
        $subcategoryValidator = function (string $attribute, mixed $value, Closure $fail) {
            if (!is_numeric($value)) {
                // Allow "---" or any other non-numeric value
                return true;
            } else {
                // Validate numeric values for existence
                Validator::make(['subcategory_id' => $value], ['subcategory_id' => 'exists:subcategory']);
            }
        };
        //validate
        $attributes = request()->validate([
            'title' => ['required', 'max:255',  Rule::unique('posts', 'title')->ignore($post->id)],
            'slug' => ['nullable', Rule::unique('posts', 'slug')->ignore($post->id)],
            // 'slug' => ['nullable', 'unique:posts'],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['image'],
            'thumbnail_alt_txt' => ['max:100'],
            'category_id' => ['nullable', $categoryValidator],
            'subcategory_id' => ['nullable', $subcategoryValidator],
            'is_published' => ['boolean'],
            'is_draft' => ['boolean'],
            'is_unpublished' => ['boolean'],
            'is_featured' => ['nullable'],
            'is_hot' =>  ['nullable'],
            'meta_title' => ['required', 'max:255'],
            'meta_description' => ['required', 'max:255'],
            'og_thumbnail' => ['nullable', 'image'],
            'og_title' => ['nullable', 'max:255'],

        ]);


        //Slug check
        if (is_null(request('slug'))) {
            //auto generate title to slug
            $attributes['slug'] = Str::slug($attributes['title'], '-');
        }

        //check if a category by slug 'uncategorized' exist in database
        $uncategorizedCategory = Category::where('slug', 'uncategorized')->firstOrCreate([
            'title' => 'Uncategorized',
            'slug' => 'uncategorized'
        ]);

        $attributes['category_id'] = request()->input('category_id') === "---" ?   $uncategorizedCategory->id : request()->input('category_id');

        $attributes['subcategory_id'] = request()->input('subcategory_id') === "---" ? null : request()->input('subcategory_id');
        /**
         * checkboxes when turned off, they are not included in the request payload, hence we manually set a default value if not turned on.
         * Make sure the value is always either 'on' or 'off' for integrity.
         */

        $attributes['is_featured'] = request('is_featured') ? 'on' : 'off';
        $attributes['is_hot'] = request('is_hot') ? 'on' : 'off';


        if (isset($attributes['thumbnail'])) {

            $post->clearMediaCollection('thumbnails');

            $post->addMediaFromRequest('thumbnail')
                ->withResponsiveImages()
                ->attributes(['alt' => request('thumbnail_alt_txt')])
                ->toMediaCollection('thumbnails');
        }

        if (isset($attributes['og_thumbnail'])) {
            $attributes['og_thumbnail'] = request()->file('og_thumbnail')->store('thumbnails');
        }

        switch (true) {
            case request()->has('is_published'):
                $attributes['is_published'] = 1;
                $attributes['is_draft'] = 0;
                $attributes['is_unpublished'] = 0;
                break;
            case request()->has('is_draft'):
                $attributes['is_published'] = 0;
                $attributes['is_draft'] = 1;
                $attributes['is_unpublished'] = 0;
                break;
            case request()->has('is_unpublished'):
                $attributes['is_published'] = 0;
                $attributes['is_draft'] = 0;
                $attributes['is_unpublished'] = 1;
                break;
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
