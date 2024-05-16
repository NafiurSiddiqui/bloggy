<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.subcategories.index', [
            'subcategories' => Subcategory::with('posts', 'category')->latest()->simplePaginate(10),
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
            'slug' => ['required', 'max:255', 'unique:subcategories,slug'],
        ]);

        //        dd($attributes);
        //store
        Subcategory::create($attributes);
        //
        //        return response()->json([
        //            'success' => true,
        //            'message' => 'Subcategory created successfully!'
        //        ]);

        return redirect('/admin/subcategories')->with('success', 'Subcategory created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Subcategory $subcategory): View
    {

        return view('subcategories.show', [
            'category' => $category,
            'subcategory' => $subcategory
        ]);
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
            'slug' => ['required', 'max:255', Rule::unique('subcategories', 'slug')->ignore($subcategory->id)],
        ]);


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
}
