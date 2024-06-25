<?php

namespace App\View\Components\Dashboard;

use App\Models\Comment;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Notification extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //get all the USERS from database whose status === pending
        $pendingRegistration = User::where('status', 'pending')->get();
        // $newComments = Comment::where('is_seen_by_admin', false)->get();
        // $newComments =
        //     // DB::table('comments')
        //     // ->where('is_seen_by_admin', false)
        //     Comment::where('is_seen_by_admin', false)
        //     ->get()
        //     ->groupBy('post_id')
        //     ->map(function ($group) {
        //         return $group->toArray();
        //     })
        //     ->toArray();

        $newComments = Auth::user()->notifications;



        if ($newComments->isNotEmpty()) {
            // dd($newComments);
        }

        return view('components.dashboard.notification', compact('pendingRegistration', 'newComments'));
    }
}
