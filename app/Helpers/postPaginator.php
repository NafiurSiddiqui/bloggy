<?php

namespace App\Helpers;

use App\Models\Post;
use Illuminate\Support\Str;

function postPaginator(Post $post)
{
    // get the immediate next post
    $nextPost = Post::where('id', '>', $post->id)->where('is_published', 1)->first();
    // get the immediate previous post
    $previousPost = Post::where('id', '<', $post->id)->where('is_published', 1)->get()->last();
    // dd($post->id, $previousPost);

    if ($post->is_featured === "on") {
        $nextPost = Post::where('id', '>', $post->id)
            ->where('is_published', 1)
            ->where('is_featured', "on")
            ->first();

        $previousPost = Post::where('id', '<', $post->id)
            ->where('is_published', 1)
            ->where('is_featured', "on")
            ->get()->last();
    }

    if ($post->is_hot === "on") {
        $nextPost = Post::where('id', '>', $post->id)
            ->where('is_published', 1)
            ->where('is_hot', "on")
            ->first();

        $previousPost = Post::where('id', '<', $post->id)
            ->where('is_published', 1)
            ->where('is_hot', "on")
            ->get()->last();
    }


    //Cateogries
    if (
        Str::contains(request()->session()->previousUrl(), 'categories')
        || (request()->has('category') && (session()->get('cameFromCategoriesURL') === true))
    ) {
        request()->session()->put('cameFromCategoriesURL', true);

        $nextPost =
            Post::where('id', '>', $post->id)
            ->where('is_published', 1)
            ->where('category_id', $post->category->id)
            ->first();

        $previousPost = Post::where('id', '<', $post->id)
            ->where('is_published', 1)
            ->where('category_id', $post->category->id)
            ->get()->last();
    } else {
        request()->session()->forget('cameFromCategoriesURL');
    }
    //Subcategories
    if (
        Str::contains(request()->session()->previousUrl(), 'category')
        || (request()->has('subcategory') && (session()->get('cameFromSubCategoriesURL') === true))
    ) {
        request()->session()->put('cameFromSubCategoriesURL', true);

        $nextPost =
            Post::where('id', '>', $post->id)
            ->where('is_published', 1)
            ->where('subcategory_id', $post->subcategory->id)
            ->first();

        $previousPost = Post::where('id', '<', $post->id)
            ->where('is_published', 1)
            ->where('subcategory_id', $post->subcategory->id)
            ->get()->last();
    } else {
        request()->session()->forget('cameFromSubCategoriesURL');
    }

    return [
        $nextPost,
        $previousPost
    ];
}
