<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/posts/featured', [PostController::class, 'showFeaturedPosts'])->name('posts.featured');
Route::get('/posts/hot', [PostController::class, 'showHotPosts'])->name('posts.hot');
Route::get('/posts/all-posts', [PostController::class, 'index'])->name('posts.all');
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.all');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{categorySlug}/{subcategory:slug}', [SubcategoryController::class, 'show'])
    ->name('subcategory.show');
Route::get('/author/{author:name}/posts', [
    PostController::class,
    'showPostsbyAuthor'
])->name('author.show.posts');



Route::get('/admin/register', [AdminRegistrationController::class, 'create'])->name('admin.register.create');
Route::post('/admin/register/store', [AdminRegistrationController::class, 'store'])->name('admin.register.store');

Route::get('/post/{post:slug}/notification/{id}', [NotificationController::class, 'showComments']);


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


Route::middleware(['auth', 'role:admin,author'])->group(function () {

    Route::view('/admin', 'admin.dashboard')->name('admin');
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])
        ->name('admin.post.create')
        ->middleware('role:admin,author');
    Route::post('/admin/images', [ImageUploadController::class, 'store'])->name('admin.images.store');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin.post.store');
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
    Route::get('/admin/post/{post:slug}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::patch('/admin/post/{post:slug}', [AdminPostController::class, 'update'])->name('admin.post.update');
    Route::delete('/admin/post/{post:slug}', [AdminPostController::class, 'destroy'])->name('admin.post.delete');

    //    CATEGORIES
    Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])->name('admin.categories');
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

        if (Category::uncategorized()->exists()) {

            //update the posts related to these selected IDs to category_slug = 'uncategorized'
            Post::whereIn('category_id', $selectedIds)
                ->update([
                    'category_id' => Category::uncategorized()->first()->id
                ]);
        } else {
            dd('something got fucked up!');
            //create a new category with title = 'uncategorized'
            $test = Category::create([
                'title' => 'Uncategorized',
                'slug' => 'uncategorized'
            ]);

            //update the posts related to all these selected IDs to category_slug = 'uncategorized'
            Post::whereIn('category_id', $selectedIds)
                ->update([
                    'category_id' => Category::uncategorized()->first()->id
                ]);
        }


        // Delete the items using the selected IDs
        Category::whereIn('id', $selectedIds)->delete();

        return redirect()->back()->with('success', 'Selected categories deleted successfully');
    })->name('admin.categories.delete.selected');

    Route::delete('/admin/categories/delete-all', function () {

        //truncate categories database except the row where title is 'uncategorized'
        if (Category::uncategorized()->exists()) {

            DB::table('categories')->where('slug', '!=', 'uncategorized')->delete();
        } else {
            dd('one of the scenario where you make sure uncateorized is created!');
            DB::table('categories')->truncate();
        }

        //delete all categories
        // DB::table('categories')->truncate();
        return redirect('/admin/categories')->with('success', 'All categories have been deleted!');
    })->name('admin.categories.delete.all');

    //    SUBCATEGORIES
    Route::get('/admin/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('/admin/subcategories/create', [SubcategoryController::class, 'create'])->name('admin.subcategories.create');
    Route::post('/admin/subcategories/store', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::delete('/admin/subcategories/delete-selected', function () {

        $selectedIds = request()->input('bulk_delete_selection');
        // dd($selectedIds);

        if (empty($selectedIds)) {
            return redirect()->back()->with('error', 'No items selected for deletion');
        }

        // Delete the items using the selected IDs
        Subcategory::whereIn('id', $selectedIds)->delete();

        return redirect()->back()->with('success', 'Selected subcategories deleted successfully');
    })->name('admin.subcategories.delete.selected');
    Route::delete('/admin/subcategories', function () {
        //delete all categories
        DB::table('subcategories')->truncate();
        return redirect('/admin/subcategories')->with('success', 'All subcategories have been deleted!');
    })->name('admin.subcategories.delete.all');
    Route::get('/admin/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('admin.subcategories.edit');
    Route::patch('/admin/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('admin.subcategories.update');
    Route::delete('admin/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('admin.subcategories.destroy');
    // Registrations
    Route::patch('/admin/registration/{user}', [AdminRegistrationController::class, 'approval'])->name('admin.registration.approval');
    //Notification
    // In web.php
    // Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);
});


Route::middleware(['auth', 'verified'])->group(function () {

    //comments
    Route::post('/post/{post:slug}/comments', [CommentController::class, 'store'])->name('post.comments.store');
    Route::delete('/post/comment/{comment}/delete', [CommentController::class, 'destroy'])->name('post.comments.delete');
    Route::get('/post/{post:slug}/comment/{comment}/edit', [CommentController::class, 'edit'])->name('post.comments.edit');
    Route::patch('/post/{post:slug}/comments/{comment}', [CommentController::class, 'update']);
    // replies
    Route::post('/post/{post:slug}/comments/{comment}/reply', [ReplyController::class, 'store'])->name('post.comments.reply.store');
    Route::get('/post/{post:slug}/comment/{comment}/reply/{reply}/edit', [ReplyController::class, 'edit'])->name('post.comments.reply.edit');
    Route::patch('/post/{post:slug}/comments/{comment}/reply/{reply}/edit', [ReplyController::class, 'update']);
    Route::delete('/post/comment/reply/{reply}/delete', [ReplyController::class, 'destroy']);
    //    PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    //email verification
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});


require __DIR__ . '/auth.php';
