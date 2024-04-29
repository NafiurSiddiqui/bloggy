<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.subcategories.index');
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
    public function store(Request $request)
    {
//        dd($request->all());
//        validate
        $attributes = request()->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'max:255', 'unique:subcategories,name'],
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
    public function show( Category $category, Subcategory $subcategory): View
    {

        return view('subcategories.show', [
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
