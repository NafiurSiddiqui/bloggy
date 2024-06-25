<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use App\Notifications\ReplyNotification;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Notifications\NotificationService;

class ReplyController extends Controller
{



    public function __construct(
        protected NotificationService $notificationService
    ) {
        $this->notificationService = $notificationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post, Comment $comment)
    {
        // dd($request->all(), $post, $comment);

        $request->validate([
            'body' => ['required', 'min:1'],
        ]);

        Reply::create([
            'body' => $request->input('body'),
            'comment_id' => $comment->id,
            'user_id' => auth()->id(),
        ]);

        //My custom service provider v( ^ v ^ )v
        //notify admin
        $this->notificationService->notifyUserByRole('admin', new ReplyNotification($post));

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Comment $comment, Reply $reply): View
    {
        // dd($reply);
        return view('posts.comments.replies.edit', compact('post', 'comment', 'reply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment, Reply $reply)
    {

        //validate body
        $request->validate([
            'body' => ['required', 'min:1'],
        ]);

        //update the reply
        $reply->update([
            'body' => $request->input('body'),
        ]);

        //return back to the previous page
        return redirect("/post/$post->slug")->with('success', 'Updated your reply successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //delete reply
        $reply->delete();

        //return back
        return redirect()->back()->with('success', 'Deleted your reply successfully!');
    }
}
