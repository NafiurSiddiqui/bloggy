<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\View\Components\Dashboard\AdminFilter;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

use Spatie\QueryBuilder\QueryBuilder;

class AdminPostController extends Controller
{
    public function index(): View
    {
        // dd(request()->all());
        $posts = Post::latest()->simplePaginate(10)->withQueryString();
        $categoryFilter = request()->input('category_filter');
        $statusFilter = request()->input('status_filter');
        $authorFilter = request()->input('admin_filter'); //gets the id
        $sortable = request('sort');

        $filteredCategory = $categoryFilter && $categoryFilter !== '' ?
            Post::where('category_id', $categoryFilter)
            ->simplePaginate(10)
            ->withQueryString()
            : $posts;



        //CATEGORY FILTER
        if ((!$authorFilter && !$statusFilter) && $filteredCategory) {

            if ($categoryFilter && $filteredCategory->isNotEmpty()) {

                $posts = $filteredCategory;
            } elseif ($categoryFilter && $filteredCategory->isEmpty() && !$authorFilter && !$statusFilter) {
                dd('the fug?');
                //flash message
                session()->now('notify', 'No posts found in this category');
            }
        }

        //STATUS FILTER
        $posts = $statusFilter && $statusFilter != '' ?
            Post::where($statusFilter, 1)
            ->latest()
            ->simplePaginate(10)
            ->withQueryString()
            : $posts;

        //ADMIN FILTER
        $filteredAuthors = $authorFilter && $authorFilter != null ?
            Post::where('user_id', $authorFilter)
            ->with('category')
            ->latest()
            ->simplePaginate(10)
            ->withQueryString()
            : $posts;

        $posts = ($authorFilter && $filteredAuthors->isNotEmpty()) ? $filteredAuthors : $posts;

        //MULTIPLE FILTER
        if ($categoryFilter && $statusFilter && !$authorFilter) {

            $result = Post::where('category_id', $categoryFilter)->where(
                $statusFilter,
                1
            )->latest()
                ->simplePaginate(10)
                ->withQueryString();

            if (($categoryFilter && $statusFilter) && $result->isNotEmpty()) {

                $posts = $filteredCategory;
            } elseif (($categoryFilter && $statusFilter && !$authorFilter) && $result->isEmpty() && !$authorFilter) {
                //flash message
                session()->now('notify', 'No posts found for your query');
            }
        }

        if ($categoryFilter && $authorFilter && !$statusFilter) {

            //query for all the posts where (category_id == categoryFilter AND  WHERE user_id == $authorFilter)
            $result = Post::where('category_id', $categoryFilter)
                ->where(
                    'user_id',
                    $authorFilter
                )->latest()
                ->simplePaginate(10)
                ->withQueryString();

            if ($categoryFilter && $result->isNotEmpty()) {

                $posts = $result;
            } elseif ($categoryFilter && $result->isEmpty()) {
                //flash message
                session()->now('notify', 'No posts found for this query');
            }
        }

        if ($authorFilter && $statusFilter && !$categoryFilter) {

            //give me all the posts WHERE id === $authorFilter AND $statusFilter == 1
            $result = Post::where('user_id', $authorFilter)
                ->where($statusFilter, 1)
                ->latest()
                ->simplePaginate(10)
                ->withQueryString();

            if ($authorFilter && $result->isNotEmpty()) {

                $posts = $result;
            } elseif ($authorFilter && $result->isEmpty()) {
                //flash message
                session()->now('notify', 'No posts found for this query');
            }
        }

        if ($categoryFilter && $statusFilter && $authorFilter) {

            $result = Post::where('category_id', $categoryFilter)
                ->where($statusFilter, 1)
                ->where('user_id', $authorFilter)
                ->latest()
                ->simplePaginate(10)
                ->withQueryString();

            if ($result->isNotEmpty()) {
                $posts = $result;
            } elseif ($result->isEmpty()) {
                $posts = Post::latest()->simplePaginate(10)->withQueryString();
                //flash message
                session()->now('notify', 'No posts found for your query');
            }
        }

        //SEARCH ENGINE
        $termSearchedFor = request('search');

        if ($termSearchedFor) {
            $result = Post::latest()
                ->filter(request(['search']))
                ->simplePaginate(10)
                ->withQueryString();


            if ($result->isNotEmpty()) {
                $posts = $result;
            } elseif ($result->isEmpty()) {
                $posts = Post::latest()->simplePaginate(10)->withQueryString();
                //flash message
                session()->now('notify', "Nothing found. Hope you did not search for status.Try filter then.");
            }
        }

        //SORTING
        if ($sortable) {
            // dd('Makes it to the sort');

            if (!$authorFilter && !$categoryFilter && !$statusFilter) {
                dd('should execute this block');
                $posts = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where('user_id', $authorFilter)
                    ->simplePaginate(10)
                    ->withQueryString();
            }

            if ($categoryFilter) {
                $result = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where('category_id', $categoryFilter)
                    ->simplePaginate(10)
                    ->withQueryString();

                if ($result->isNotEmpty()) {
                    $posts = $result;
                } elseif ($result->isEmpty()) {
                    $posts = QueryBuilder::for(Post::class)
                        ->allowedSorts(['title', 'updated_at'])
                        ->simplePaginate(10)
                        ->withQueryString();
                    session()->now('notify', 'Could not sort with filtered category');
                }
                // dd('should be sorted with category');
            }

            if ($authorFilter) {
                $result = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where('user_id', $authorFilter)
                    ->simplePaginate(10)
                    ->withQueryString();

                if ($result->isNotEmpty()) {
                    $posts = $result;
                } elseif ($result->isEmpty()) {
                    $posts = QueryBuilder::for(Post::class)
                        ->allowedSorts(['title', 'updated_at'])
                        ->simplePaginate(10)
                        ->withQueryString();
                    session()->now('notify', 'Could not sort with filtered Author');
                }
            }
            if ($statusFilter) {
                $result = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where($statusFilter, 1)
                    ->simplePaginate(10)
                    ->withQueryString();

                if ($result->isNotEmpty()) {
                    $posts = $result;
                } elseif ($result->isEmpty()) {
                    $posts = QueryBuilder::for(Post::class)
                        ->allowedSorts(['title', 'updated_at'])
                        ->simplePaginate(10)
                        ->withQueryString();
                    session()->now('notify', 'Could not sort with filtered Author');
                }
            }

            if ($categoryFilter && $statusFilter) {
                $result = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where('category_id', $categoryFilter)
                    ->where($statusFilter, 1)
                    ->simplePaginate(10)
                    ->withQueryString();

                if ($result->isNotEmpty()) {
                    $posts = $result;
                } elseif ($result->isEmpty()) {
                    $posts = QueryBuilder::for(Post::class)
                        ->allowedSorts(['title', 'updated_at'])
                        ->simplePaginate(10)
                        ->withQueryString();
                    session()->now('notify', 'Could not sort with filtered category');
                }
                // dd('should be sorted with category');
            }

            if ($categoryFilter && $authorFilter) {
                $result = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where('category_id', $categoryFilter)
                    ->where('user_id', $authorFilter)
                    ->simplePaginate(10)
                    ->withQueryString();

                if ($result->isNotEmpty()) {
                    $posts = $result;
                } elseif ($result->isEmpty()) {
                    $posts = QueryBuilder::for(Post::class)
                        ->allowedSorts(['title', 'updated_at'])
                        ->simplePaginate(10)
                        ->withQueryString();
                    session()->now('notify', 'Could not sort with filtered category and author');
                }
                // dd('should be sorted with category');
            }

            if ($statusFilter && $authorFilter) {
                $result = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where($statusFilter, 1)
                    ->where('user_id', $authorFilter)
                    ->simplePaginate(10)
                    ->withQueryString();

                if ($result->isNotEmpty()) {
                    $posts = $result;
                } elseif ($result->isEmpty()) {
                    $posts = QueryBuilder::for(Post::class)
                        ->allowedSorts(['title', 'updated_at'])
                        ->simplePaginate(10)
                        ->withQueryString();
                    session()->now('notify', 'Could not sort with filtered category and author');
                }
                // dd('should be sorted with category');
            }

            if ($statusFilter && $authorFilter && $categoryFilter) {
                $result = QueryBuilder::for(Post::class)
                    ->allowedSorts(['title', 'updated_at'])
                    ->where($statusFilter, 1)
                    ->where('user_id', $authorFilter)
                    ->where('category_id', $categoryFilter)
                    ->simplePaginate(10)
                    ->withQueryString();

                if ($result->isNotEmpty()) {
                    $posts = $result;
                } elseif ($result->isEmpty()) {
                    $posts = QueryBuilder::for(Post::class)
                        ->allowedSorts(['title', 'updated_at'])
                        ->simplePaginate(10)
                        ->withQueryString();
                    session()->now('notify', 'Zoink! Could not sort with the filtered items.');
                }
                // dd('should be sorted with category');
            }
        }

        return view('admin.posts.index', [
            // 'posts' => Post::latest()->filter(['search'])->get(),
            'posts' => $posts,

        ]);
    }

    public function create(): View
    {

        return view('admin.posts.create', [
            'posts' => Post::all()->sortByDesc('created_at')
        ]);
    }

    public function store(): RedirectResponse
    {

        // dd(request()->all());
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


        //associate user_id and store file
        $attributes['subcategory_id'] = request()->input('subcategory_id') === "---" ? null : request()->input('subcategory_id');
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        if (isset($attributes['og_thumbnail'])) {
            $attributes['og_thumbnail'] = request()->file('og_thumbnail')->store('thumbnails');
        }
        //auto generate title to slug
        $attributes['slug'] = request('slug') ? Str::slug(request('slug'), '-') : Str::slug($attributes['title'], '-');

        //store
        Post::create($attributes);

        //redirect
        if (request()->has('is_draft')) {

            return redirect('/admin/posts')->with('notify', 'Post saved as draft!');
        } else {
            return redirect('/admin/posts')->with('success', 'Post created!');
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
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'description' => ['required', 'max:255'],
            'body' => 'required',
            'thumbnail' => ['image'],
            'thumbnail_alt_txt' => ['max:100'],
            'category_id' => ['nullable', $categoryValidator],
            'subcategory_id' => ['nullable', $subcategoryValidator],
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

        //check if a category by slug 'uncategorized' exist in database
        $uncategorizedCategory = Category::where('slug', 'uncategorized')->firstOrCreate([
            'title' => 'Uncategorized',
            'slug' => 'uncategorized'
        ]);

        $attributes['category_id'] = request()->input('category_id') === "---" ?   $uncategorizedCategory->id : request()->input('category_id');

        $attributes['subcategory_id'] = request()->input('subcategory_id') === "---" ? null : request()->input('subcategory_id');
        $attributes['is_featured'] = request('is_featured') ? 'on' : 'off';
        $attributes['is_hot'] = request('is_hot') ? 'on' : 'off';

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
