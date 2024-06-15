<?php

namespace App\View\Components\Dashboard;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Dashboard extends Component
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
        //get all the users whose status is EQUAL to pending
        $pending_registrations = User::where('status', 'pending')->get();
        $pending_registrations_count = User::where('status', 'pending')->count();

        return view('components.dashboard.dashboard', compact(['pending_registrations', 'pending_registrations_count']));
    }
}
