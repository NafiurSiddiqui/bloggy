<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::with('subcategories','posts')->orderBy('created_at','desc')->simplePaginate(10)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
//        dd($request->all());
        //validate
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:categories' ],
            'slug' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        //store
        Category::create($attributes);

        return redirect('/admin/categories')->with('success', 'Category created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('categories.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category):RedirectResponse
    {
        //validate
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:categories' ],
            'slug' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        //store
        $category->update($attributes);

        return redirect('/admin/categories')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect('/admin/categories')->with('success', 'Category deleted!');
    }
}
