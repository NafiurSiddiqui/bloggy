<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Spatie\QueryBuilder\QueryBuilder;
use function App\Helpers\slugConverter;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $subcategories = QueryBuilder::for(Subcategory::class)
            ->allowedSorts(['title', 'updated_at'])
            ->with('category', 'posts')
            ->simplePaginate(10)
            ->withQueryString();

        $filter = request('filter');


        $paginationFilter = null;
        //for filter
        if (isset($filter) && $filter['slug'] !== null) {
            $filteredResponse = QueryBuilder::for(Category::class)
                ->allowedFilters(['slug'])
                ->with('subcategories')
                ->latest()
                ->simplePaginate(10)
                ->withQueryString();


            $paginationFilter = $filteredResponse;
            $subcategories = $filteredResponse[0]->subcategories;
        }
        if (isset($filter) && $filter['slug'] == null) {

            $subcategories = QueryBuilder::for(Subcategory::class)
                ->allowedSorts(['title', 'updated_at'])
                ->with('category', 'posts')
                ->simplePaginate(10)
                ->withQueryString();
        }

        if (request('sort')) {
            $subcategories = Subcategory::orderBy(request('sort'), request('dir'))
                ->with('category', 'posts')
                ->simplePaginate(10)
                ->withQueryString();
        }




        return view('admin.subcategories.index', [

            // 'subcategories' => Subcategory::filter(request('filter') != null && request('filter')['slug']),
            'subcategories' => $subcategories,
            'paginationFilter' => $paginationFilter

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        //        validate
        $attributes = request()->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'max:255', 'unique:subcategories,title'],
            'slug' => ['nullable', 'max:255', 'unique:subcategories,slug'],
        ]);

        $attributes['slug'] = slugConverter($attributes);

        //store
        Subcategory::create($attributes);

        return redirect('/admin/subcategories')->with('success', 'Subcategory created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $categorySlug, Subcategory $subcategory): View
    {
        $posts = $subcategory->posts->filter(function (Post $post) {
            return $post->is_published === 1;
        });


        return view('posts.subcategories.index', compact('subcategory', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory): View
    {
        return view('admin.subcategories.edit', [
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory): RedirectResponse
    {

        //validate
        $attributes = request()->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'max:255', Rule::unique('subcategories', 'title')->ignore($subcategory->id)],
            'slug' => ['nullable', 'max:255', Rule::unique('subcategories', 'slug')->ignore($subcategory->id)],
        ]);

        $attributes['slug'] = slugConverter($attributes);
        $subcategory->update($attributes);

        return redirect('/admin/subcategories')->with('success', 'Subcategory updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory): RedirectResponse
    {
        $subcategory->delete();
        return redirect('/admin/subcategories')->with('success', 'Subcategory deleted!');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
