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

            'status' => [
                'draft' => [
                    'title' => 'Draft',
                    'slug' => 'is_draft'
                ],
                'published' => [
                    'title' => 'Published',
                    'slug' => 'is_published'
                ],
                'unpublished' => [
                    'title' => 'Unpublished',
                    'slug' => 'is_unpublished'
                ]
            ]

        ]);
    }
}
