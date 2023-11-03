<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class SearchPost extends Component
{
    private array $perPageOptions = [Controller::PER_PAGE, 20, 50, 70, 90];

    private Collection $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Category::orderBy('title')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-post', [
            'perPageOptions' => $this->perPageOptions,
            'categories' => $this->categories
        ]);
    }
}
