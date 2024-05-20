<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusFilter extends Component
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
        return view('components.dashboard.status-filter', [
            //get all the posts from the 'posts' table where 'is_published' column has 1 or true.
            'published' => \App\Models\Post::where('is_published', 1)->simplePaginate(10),
            'draft' => \App\Models\Post::where('is_draft', 1)->simplePaginate(10),
            'is_unpublished' => \App\Models\Post::where('is_unpublished')->simplePaginate(10)

        ]);
    }
}
