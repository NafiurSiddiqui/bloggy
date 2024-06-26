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
        //I am using this USER query once again in the dashboard.
        $pendingRegistration = User::where('status', 'pending')->get();

        $commentaryNotifications = Auth::user()->notifications;

        return view('components.dashboard.notification', compact('pendingRegistration', 'commentaryNotifications'));
    }
}
