<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Contracts\View\View;

use function App\Helpers\postPaginator;

class NotificationController extends Controller
{
    public function showComments(Post $post, string $id): View
    {

        [$nextPost, $previousPost] = postPaginator($post);

        $recentPosts =
            Post::where('is_published', 1)
            ->whereNot('id', $post->id)
            ->latest()
            ->take(8)
            ->get();

        //destroy notifications - comment and replies
        auth()->user()->notifications()->where('id', $id)->delete();


        return view('posts.show', compact('post', 'nextPost', 'previousPost', 'recentPosts'));
    }
}
