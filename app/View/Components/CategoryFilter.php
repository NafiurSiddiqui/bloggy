<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryFilter extends Component
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


        $filter = request('filter');

        return view('components.category-filter', [
            'categories' => Category::all()->sortBy('title'),
            'currentCategory' => isset($filter) ? Category::firstWhere('slug', $filter['slug']) : null
        ]);
    }
}
