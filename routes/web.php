<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('category');
Route::get('/categories/{category:slug}/{subcategory:slug}', [SubcategoryController::class, 'show'])->name('subcategory');
Route::get('/author/{author:id}/posts', function (string $id) {
    return view('posts.author.index', [
        'posts' => Post::where('user_id', $id)->get()
    ]);
});



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
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/{post:slug}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::patch('/admin/post/{post:slug}', [AdminPostController::class, 'update'])->name('admin.post.update');
    Route::delete('/admin/post/{post:slug}', [AdminPostController::class, 'destroy'])->name('admin.post.delete');
    Route::delete('/admin/posts/delete-all', function () {
        //delete all posts
        DB::table('posts')->truncate();
        return redirect('/admin/posts')->with('success', 'All posts have been deleted!');
    })->name('admin.posts.delete.all');
    Route::delete('/admin/posts/delete-selected-posts', function () {

        $selectedIds = request()->input('bulk_delete_selection');

        if (empty($selectedIds)) {
            // Handle no items selected scenario
            return redirect()->back()->with('message', 'No items selected for deletion');
        }
        // Delete the items using the selected IDs
        Post::whereIn('id', $selectedIds)->delete();

        return redirect()->back()->with('success', 'Selected items deleted successfully');
    })->name('posts.delete.selected');


    //    CATEGORIES
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::patch('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::delete('/admin/categoires/delete-selected', function () {

        $selectedIds = request()->input('bulk_delete_selection');

        if (empty($selectedIds)) {

            return redirect()->back()->with('error', 'No items selected for deletion');
        }

        //check if uncategorized cateogory exists inside 'categories' db
        $uncategorizedExist = App\Models\Category::where('title', 'uncategorized')->exists();

        if ($uncategorizedExist) {
            //find the id of the 'uncategorized' cat
            $uncategorizedId = App\Models\Category::where('title', 'uncategorized')->first()->id;
            //update the posts related to these selected IDs to category_slug = 'uncategorized'
            Post::whereIn('category_id', $selectedIds)->update(['category_id' => $uncategorizedId]);
        } else {
            //create a new category with title = 'uncategorized'
            $test = Category::create([
                'title' => 'uncategorized',
                'slug' => 'uncategorized'
            ]);
            $uncategorizedId = App\Models\Category::where('title', 'uncategorized')->first()->id;
            dd($uncategorizedId);
            //update the posts related to all these selected IDs to category_slug = 'uncategorized'
            Post::whereIn('category_id', $selectedIds)->update(['category_id' => $uncategorizedId]);
        }


        // Delete the items using the selected IDs
        Category::whereIn('id', $selectedIds)->delete();

        return redirect()->back()->with('success', 'Selected categories deleted successfully');
    })->name('admin.categories.delete.selected');

    Route::delete('/admin/categories', function () {
        //delete all categories
        DB::table('categories')->truncate();
        return redirect('/admin/categories')->with('success', 'All categories have been deleted!');
    })->name('admin.categories.delete.all');

    //    SUBCATEGORIES
    Route::get('/admin/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('/admin/subcategories/create', [SubcategoryController::class, 'create'])->name('admin.subcategories.create');
    Route::post('/admin/subcategories/store', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::get('/admin/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('admin.subcategories.edit');
    Route::patch('/admin/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('admin.subcategories.update');
    Route::delete('admin/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('admin.subcategories.destroy');

    //    PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
