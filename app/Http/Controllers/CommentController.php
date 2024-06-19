<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {

        // dd($post);

        $request->validate([
            'body' => ['required', 'min:1']
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body'),
        ]);

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Comment $comment): View
    {
        // dd($post, $comment);

        return view('posts.comments.edit', compact('post', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {


        $request->validate([
            'body' => ['required', 'min:1']
        ]);

        //update
        $comment->update([
            'body' => request('body')
        ]);

        return redirect("/posts/$post->slug")->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
