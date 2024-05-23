<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\View\Components\Dashboard\AdminFilter;
use Closure;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

use Spatie\QueryBuilder\QueryBuilder;

class AdminPostController extends Controller
{
    public function index(): View
    {

        $categoryFilter = request()->input('filter.slug');
        $statusFilter = request()->input('status_filter');
        $adminFilter = request()->input('admin_filter'); //gets the id
        // dd($adminFilter);

        $filteredCategories = $categoryFilter && $categoryFilter !== '' ?
            QueryBuilder::for(Category::class)
            ->allowedFilters(['slug'])
            ->with('posts')
            ->latest()
            ->simplePaginate(10) : null;
        $filteredStatus = $statusFilter && $statusFilter != '' ?
            Post::where($statusFilter, 1)
            ->latest()
            ->simplePaginate(10) : null;

        $filteredAdmins = $adminFilter && $adminFilter != null ?
            User::where('id', $adminFilter)
            ->with('posts')
            ->latest()
            ->simplePaginate(10) : null;
        $termSearchedFor = request('search');

        // dd($termSearchedFor);

        //if both all filters are set
        if ($categoryFilter && $statusFilter) {

            //return all the posts for the selected CATEGORY value, 
            //include only the posts whose status == 1.
            $filteredCategories = Category::where('slug', $categoryFilter)->with('posts', function ($query) use ($statusFilter) {
                $query->where($statusFilter, 1);
            })->get();
            // dd($filteredCategories);
        }

        if ($categoryFilter && $statusFilter && $filteredAdmins) {

            //return all the posts for the selected CATEGORY value, 
            //include only the posts whose status == 1.
            $filteredCategories = Category::where('slug', $categoryFilter)->with('posts', function ($query) use ($statusFilter, $adminFilter) {
                $query->where($statusFilter, 1)
                    ->whereHas('author', function ($query) use ($adminFilter) {
                        $query->where('id', $adminFilter);
                    });
            })->get();
        }

        $postsSearchedFor = Post::where('title', 'like', '%' . $termSearchedFor . '%')
            ->orWhere('body', 'like', '%' . $termSearchedFor . '%');

        // $postsSearchedFor =
        //     Post::when(
        //         $termSearchedFor ?? false,
        //         fn ($query, $search) =>
        //         $query->where(
        //             fn ($query) =>
        //             $query->where('title', 'like', '%' . $search . '%')
        //                 ->orWhere('body', 'like', '%' . $search . '%')
        //         )
        //     );

        // dd($postsSearchedFor);
        return view('admin.posts.index', [
            'posts' => Post::latest()->filter(['search'])->simplePaginate(10),
            'categories' => $filteredCategories,
            'postsByStatus' => $filteredStatus,
            'postsByAdmins' => $filteredAdmins,
            'postsBySearch' => $postsSearchedFor

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
        // dd(request()->input('subcategory_id') === "---");

        $subcategoryIdValidator = function (string $attribute, mixed $value, Closure $fail) {
            if ($value !== "---" && !Validator::make(['subcategory_id' => $value], ['subcategory_id' => 'exists:subcategory'])->passes()) {
                $fail('The subcategory ID must be a valid existing subcategory or "---".');
            }
        };

        //validate
        $attributes = request()->validate([
            'title' => ['required', 'max:255', 'unique:posts'],
            'slug' => ['required', 'unique:posts'],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['required', 'image'],
            'thumbnail_alt_txt' => ['required', 'max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            // 'subcategory_id' => ['nullable', 'exists:subcategories,id'],
            'subcategory_id' => ['nullable', function (string $attribute, mixed $value, Closure $fail) {
                if (!is_numeric($value)) {
                    // Allow "---" or any other non-numeric value
                    return true;
                } else {

                    // Validate numeric values for existence
                    Validator::make(['subcategory_id' => $value], ['subcategory_id' => 'exists:subcategory']);
                }
            }],
            'is_featured' => ['nullable'],
            'is_published' => ['boolean'],
            'is_draft' => ['boolean'],
            'is_hot' =>  ['nullable'],
            'meta_title' => ['required', 'max:255'],
            'meta_description' => ['required', 'max:255'],
            'og_thumbnail' => ['nullable', 'image'],
            'og_title' => ['nullable', 'max:255'],

        ]);


        //associate user_id and store file
        $attributes['subcategory_id'] = request()->input('subcategory_id') === "---" ? null : request()->input('subcategory_id');
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

        // dd(request()->all());
        // dd(request()->input('subcategory_id') === "---");
        //validate
        $attributes = request()->validate([
            'title' => ['required', 'max:255',  Rule::unique('posts', 'title')->ignore($post->id)],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['image'],
            'thumbnail_alt_txt' => ['max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['nullable', function (string $attribute, mixed $value, Closure $fail) {
                if (!is_numeric($value)) {
                    // Allow "---" or any other non-numeric value
                    return true;
                } else {

                    // Validate numeric values for existence
                    Validator::make(['subcategory_id' => $value], ['subcategory_id' => 'exists:subcategory']);
                }
            }],
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

        // dd(request()->input('subcategory_id') === "---");
        $attributes['subcategory_id'] = request()->input('subcategory_id') === "---" ? null : request()->input('subcategory_id');
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
