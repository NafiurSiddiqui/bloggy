<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('category');
Route::get('/categories/{category:slug}/{subcategory:slug}', [SubcategoryController::class, 'show'])->name('subcategory');




//Route::get('/admin', function () {
//    return view('admin.dashboard');
//})->middleware(['auth', 'verified'])->name('admin');

//Route::middleware(['auth', 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('admin.dashboard');
//    })->name('dashboard');
//});


//you have a situation here
//you will have user for comments
//you have user (admin) side.

Route::middleware('auth')->group(function () {

    Route::view('/admin', 'admin.dashboard')->name('admin');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin.post.store');
//    CATEGORIES
    Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories');
    Route::get('/admin/categories/create',[CategoryController::class,'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store',[CategoryController::class,'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit',[CategoryController::class,'edit'])->name('admin.categories.edit');
    Route::patch('/admin/categories/{category}',[CategoryController::class,'update'])->name('admin.categories.update');
    Route::delete('admin/categories/{category}',[CategoryController::class,'destroy'])->name('admin.categories.destroy');
//    SUBCATEGORIES
    Route::get('/admin/subcategories',[SubcategoryController::class,'index'])->name('admin.subcategories');
    Route::get('/admin/subcategories/create',[SubcategoryController::class,'create'])->name('admin.subcategories.create');
    Route::post('/admin/subcategories/store',[SubcategoryController::class,'store'])->name('admin.subcategories.store');
    Route::get('/admin/subcategories/{subcategory}/edit',[SubcategoryController::class,'edit'])->name('admin.subcategories.edit');
    Route::patch('/admin/subcategories/{subcategory}',[SubcategoryController::class,'update'])->name('admin.subcategories.update');
    Route::delete('admin/subcategories/{subcategory}',[SubcategoryController::class,'destroy'])->name('admin.subcategories.destroy');

//    PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
