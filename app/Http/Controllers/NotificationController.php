<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Contracts\View\View;




class NotificationController extends Controller
{
    public function showComments(Post $post, string $id): View
    {

        //destroy notifications - comment and replies
        auth()->user()->notifications()->where('id', $id)->delete();


        return view('posts.show', compact('post'));
    }
}
